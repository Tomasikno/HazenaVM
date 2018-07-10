<?php
/**
 * Created by PhpStorm.
 * User: pazourekt.98
 * Date: 16.03.2018
 * Time: 10:28
 */

class AdminGalerieKontroler extends Kontroler
{

    function zpracuj($parametry)
    {
        $spravceUzivatelu = new SpravceUzivatelu();
        //Ověří zda je uživatel přihlášený, pokud není, přesměruje na "prihlaseni"
        if ($spravceUzivatelu->vratUzivatele() == null) {
            $this->pridejZpravu("Nedostatečná oprávnění.");
            $this->pohled = 'prihlaseni';

        } else {
            $this->pohled = "adminGalerie";
            $this->hlavicka["titulek"] = "Úprava galerie";

            $spravceGalerie = new SpravceGalerie();

            $this->data['kategorie_all'] = $spravceGalerie->vratKategorie();

            if (isset($_GET['kategorie'])) {
                $this->data['kategorie_fotky'] = $spravceGalerie->vratKategorii($_GET['kategorie']);
            }

            if (isset($_POST['upload'])) {
                $name = rand(0, 100000) . $_FILES['obrazek']['name'];
                move_uploaded_file($_FILES['obrazek']["tmp_name"], "uploads/" . $name);
                $spravceGalerie->ulozObrazek($_GET['kategorie'], $name, $_POST['popisek']);
                $this->pridejZpravu("Obrázek přidán");
                $this->presmeruj("adminGalerie");
            }

            if (isset($_GET['smazat'])) {
                $spravceGalerie->smazObrazek($_GET['smazat']);
                $this->pridejZpravu("obrázek smazán");
                $this->presmeruj("adminGalerie");
            }

            if (isset($_POST['kategorie_send'])) {
                try {
                    $spravceGalerie->ulozKategorii($_POST['nazev']);
                } catch (Exception $e) {
                    $this->pridejZpravu($e->getMessage());
                }
                $this->presmeruj("adminGalerie");
            }
            if (isset($_GET['smazat_kategorii'])) {
                $spravceGalerie->smazKateogrii($_GET['smazat_kategorii']);
                $this->pridejZpravu("Kategorie smazana s veskerym obsahem!");
                $this->presmeruj('adminGalerie');
            }


        }
    }
}