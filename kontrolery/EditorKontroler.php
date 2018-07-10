<?php


// Kontroller pro výpis článků

class EditorKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        $spravceUzivatelu = new SpravceUzivatelu();
        //Ověří zda je uživatel přihlášený, pokud není, přesměruje na "prihlaseni"
        if ($spravceUzivatelu->vratUzivatele() == null) {
            $this->pridejZpravu("Nedostatečná oprávnění.");
            $this->pohled = "prihlaseni";
        } else {
            $this->hlavicka['titulek'] = 'Editor článků';
            $spravceClanku = new SpravceClanku();
            $clanek = array(
                'clanky_id' => '',
                'titulek' => '',
                'obsah' => '',
                'url' => '',
                'popisek' => '',
            );
            // Je odeslán formulář
            if ($_POST) {
                // Získání článku z $_POST
                $klice = array('titulek', 'obsah', 'url', 'popisek', 'klicova_slova');
                $clanek = array_intersect_key($_POST, array_flip($klice));
                // Uložení článku do DB
                $spravceClanku->ulozClanek($_POST['clanky_id'], $clanek);
                $this->pridejZpravu('Článek byl úspěšně uložen.');
                $this->presmeruj('clanek/' . $clanek['url']);
            } // Je zadané URL článku k editaci
            else if (!empty($parametry[0])) {
                $nactenyClanek = $spravceClanku->vratClanek($parametry[0]);
                if ($nactenyClanek)
                    $clanek = $nactenyClanek;
                else
                    $this->pridejZpravu('Článek nebyl nalezen');
            }

            $this->data['clanek'] = $clanek;
            $this->pohled = 'editor';
        }

    }
}