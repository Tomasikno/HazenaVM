<?php
/**
 * Created by PhpStorm.
 * User: TomPa
 * Date: 23.01.2018
 * Time: 23:03
 */

class ClankyHraciKontroler extends Kontroler
{

    public function zpracuj($parametry)
    {

        $spravceUzivatelu = new SpravceUzivatelu();
        //Ověří zda je uživatel přihlášený, pokud není, přesměruje na "prihlaseni"
        if ($spravceUzivatelu->vratUzivatele() == null) {
            $this->pridejZpravu("Nedostatečná oprávnění.");
            $this->pohled = "prihlaseni";
        } else {
            //instance modelu pro umozneni prace se clanky
            $spravceHraci = new SpravceHraci();
            $spravceUzivatelu = new SpravceUzivatelu();
            $uzivatel = $spravceUzivatelu->vratUzivatele();
            $this->data['admin'] = $uzivatel && $uzivatel['admin'];

            // Je zadáno URL článku ke smazání
            if (!empty($parametry[1]) && $parametry[1] == 'odstranit') {
                $this->overUzivatele(true);
                $spravceHraci->odstranClanekHrac($parametry[0]);
                $this->pridejZpravu('Článek byl úspěšně odstraněn.');
                $this->presmeruj('clanek');
            } //když je zadana URl clanku
            else if (!empty($parametry)) {
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
                $this->pohled = 'clankyHraci';
            }
        }

    }
}