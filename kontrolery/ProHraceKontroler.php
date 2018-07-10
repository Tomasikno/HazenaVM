<?php

class ProHraceKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        //instance modelu pro umozneni prace se clanky
        $spravceHraci = new SpravceHraci();

        if (!empty($parametry)) {
            //ziskani clanku podle jeho url
            $clanek = $spravceHraci->vratClanekHrac($parametry[0]);

            //kdyz se clanek nenajde - presmerovani na chybovou stránku
            if (!$clanek) {
                $this->presmeruj('chyba');
            }

            $this->hlavicka = array(
                'titulek' => $clanek['titulek'],
                'popisek' => $clanek['popisek'],
            );

            $this->data['titulek'] = $clanek['titulek'];
            $this->data['obsah'] = $clanek['obsah'];
            //nastaveni sablony
            $this->pohled = 'clanek';
        } //když není zadána URl článku tak se vypíše seznam článků
        else {
            $clanky = $spravceHraci->vratClankyHrac();
            $this->data['clanky'] = $clanky;
            $this->pohled = 'proHrace';
        }
    }
}