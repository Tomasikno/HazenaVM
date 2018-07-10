<?php


class SmerovacKontroler extends Kontroler
{
    // Instance controlleru
    protected $kontroler;

    // Metoda převede pomlčkovou variantu controlleru na název třídy
    private function pomlckyDoVelbloudiNotace($text)
    {
        $veta = str_replace('-', ' ', $text);
        $veta = ucwords($veta);
        $veta = str_replace(' ', '', $veta);
        return $veta;
    }

    // Naparsuje URL adresu podle lomítek a vrátí pole parametrů
    private function parsujURL($url)
    {
        // Naparsuje jednotlivé části URL adresy do asociativního pole
        $naparsovanaURL = parse_url($url);
        // Odstranění počátečního lomítka
        $naparsovanaURL["path"] = ltrim($naparsovanaURL["path"], "/");
        // Odstranění bílých znaků kolem adresy
        $naparsovanaURL["path"] = trim($naparsovanaURL["path"]);
        // Rozbití řetězce podle lomítek
        $rozdelenaCesta = explode("/", $naparsovanaURL["path"]);
        return $rozdelenaCesta;
    }

    // Naparsování URL adresy a vytvoření příslušného controlleru
    public function zpracuj($parametry)
    {
        $naparsovanaURL = $this->parsujURL($parametry[0]);
        if (empty($naparsovanaURL[0]))
            $this->presmeruj('uvod');

        // kontroler je 1. parametr URL
        $tridaKontroleru = $this->pomlckyDoVelbloudiNotace(array_shift($naparsovanaURL)) . 'Kontroler';

        if (file_exists('kontrolery/' . $tridaKontroleru . '.php'))
            $this->kontroler = new $tridaKontroleru;
        else
            $this->presmeruj('chyba');

        $this->kontroler->zpracuj($naparsovanaURL);

        $this->data['titulek'] = $this->kontroler->hlavicka['titulek'];
       // $this->data['popisek'] = $this->kontroler->hlavicka['popisek'];


        $this->data['zpravy'] = $this->vratZpravy();
        $this->pohled = 'rozlozeni';
    }


//Notice: Undefined index: popis in G:\htdocs\kontrolery\SmerovacKontroler.php on line 52
}