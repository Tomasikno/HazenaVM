<?php
/**
 * Created by PhpStorm.
 * User: pazourekt.98
 * Date: 24.01.2018
 * Time: 12:04
 */

class EditorHraciKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        $spravceUzivatelu = new SpravceUzivatelu();
        //Ověří zda je uživatel přihlášený, pokud není, přesměruje na "prihlaseni"
        if ($spravceUzivatelu->vratUzivatele() == null) {
            $this->pridejZpravu("Nedostatečná oprávnění.");
            $this->pohled = "prihlaseni";
        } else {
            $this->hlavicka['titulek'] = 'Editor "Pro hráče"';
            $spravceClanku = new SpravceHraci();
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
                $klice = array('titulek', 'obsah', 'url', 'popisek');
                $clanek = array_intersect_key($_POST, array_flip($klice));
                // Uložení článku do DB
                $spravceClanku->ulozClanekHrac($_POST['clanky_id'], $clanek);
                $this->pridejZpravu('Článek byl úspěšně uložen.');
                $this->presmeruj('proHrace/' . $clanek['url']);
            } // Je zadané URL článku k editaci
            else if (!empty($parametry[0])) {
                $nactenyClanek = $spravceClanku->vratClanekHrac($parametry[0]);
                if ($nactenyClanek)
                    $clanek = $nactenyClanek;
                else
                    $this->pridejZpravu('Článek nebyl nalezen');
            }

            $this->data['clanek'] = $clanek;
            $this->pohled = 'editorHraci';
        }

    }
}