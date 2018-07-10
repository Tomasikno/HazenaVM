<?php

class UvodKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        //instance modelu pro umozneni prace se clanky
        $spravceClanku = new SpravceClanku();
        $pagination = new Pagination();

        //když je zadana URl clanku
        if (!empty($parametry)) {
            //ziskani clanku podle jeho url
            $clanek = $spravceClanku->vratClanek($parametry[0]);

            //kdyz se clanek nenajde - presmerovani na chybovou stránku
            if (!$clanek) {
                $this->presmeruj('chyba');
            }

            $this->hlavicka = array(
                'titulek' => "Úvod",
                'popisek' => $clanek['popisek'],
            );

            $this->data['titulek'] = $clanek['titulek'];
            $this->data['time_stamp'] = $clanek['time_stamp'];
            $this->data['obsah'] = $clanek['obsah'];
            //nastaveni sablony
            $this->pohled = 'clanek';
        } //když není zadána URl článku tak se vypíše seznam článků (vrati se na uvodni stranku)
        else {
            //nastaveni promenych
            $pocetClankuCelkem = $pagination->numberOfResultsInTable('clanky', 'clanky_id');
            $pocetStranek = $pagination->totalPages($pocetClankuCelkem);
            $limitNaStranku = $pagination->getResultsPerPage();
            $clankyStart = $pagination->determineArticleStart();

            $prvniClanek = $spravceClanku->vratNejnovejsiClanek();

            //nacteni promenych do sablony
            $this->data['pocetStranek'] = $pocetStranek;
            $this->data['limitNaStranku'] = $limitNaStranku;
            $this->data['clankyStart'] = $clankyStart;
            $this->data['prvniClanek'] = $prvniClanek;


            // Pokud neni nastavena page - nastavi se aktualni stranka na 1
            if (!isset($_GET['page']))
                $page = 1;
            //Pokud je nastavena - prepise se aktualni stranka
            else
                $page = $_GET['page'];

            //Update stránek
            $pagination->updatePages($page, $pocetStranek);
            /*           if ($pagination->current_page < 1)
                           $pagination->current_page = 1;

                       if ($pagination->current_page >= $pocetStranek)
                           $pagination->current_page = $pocetStranek;
                   }


                   $pagination->previous_page = $pagination->next_page = $pagination->current_page;
                   $pagination->previous_page--;
                   $pagination->next_page++;

                   if ($pagination->next_page >= $pocetStranek)
                       $pagination->next_page = $pocetStranek;

                   if ($pagination->previous_page <= 0)
                       $pagination->previous_page = 1;
            */
            /*
                        // Pokud neni nastavena page - nastavi se aktualni stranka na 1
                        if (!isset($_GET['page'])) {
                            $pagination->current_page = 1;
                        } //Pokud je nastavena - prepise se aktualni stranka
                        else {
                            $pagination->current_page = $_GET['page'];

                            if ($pagination->current_page < 1)
                                $pagination->current_page = 1;

                            if ($pagination->current_page >= $pocetStranek)
                                $pagination->current_page = $pocetStranek;
                        }


                        $pagination->previous_page = $pagination->next_page = $pagination->current_page;
                        $pagination->previous_page--;
                        $pagination->next_page++;

                        if ($pagination->next_page >= $pocetStranek)
                            $pagination->next_page = $pocetStranek;

                        if ($pagination->previous_page <= 0)
                            $pagination->previous_page = 1;

            */
            $this->data['predchoziStranka'] = $pagination->previous_page;
            $this->data['nasledujiciStranka'] = $pagination->next_page;
            $this->data['stranka'] = $page;
            $clanky = $pagination->getLimitedArticles();
            //  $clanky = $spravceClanku->vratClanky();
            $this->data['clanky'] = $clanky;
            $this->pohled = 'uvod';
        }
    }

}