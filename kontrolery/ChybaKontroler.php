<?php

/**
 *
 */
class ChybaKontroler extends Kontroler
{

    public function zpracuj($parametry)
    {
        //hlavicka pozadavku
        header("HTTP/1.0 404 Not Found");
        //hlavicka stranky
        $this->hlavicka ['titulek'] = 'Chyba 404';
        //nastaveni sablony
        $this->pohled = 'chyba';
    }
}