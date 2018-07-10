<?php

class GalerieKontroler extends Kontroler
{

    function zpracuj($parametry)
    {
        $this->pohled = "galerie";
        $this->hlavicka["titulek"] = "Galerie";

        $spravceGalerie = new SpravceGalerie();

        $this->data['kategorie_all'] = $spravceGalerie->vratKategorie();

        if (isset($_GET['kategorie'])) {
            $this->data['kategorie_fotky'] = $spravceGalerie->vratKategorii($_GET['kategorie']);
        }


        if (isset($_POST['upload'])) {
            $name = rand(0, 100000) . $_FILES['obrazek']['name'];
            move_uploaded_file($_FILES['obrazek']["tmp_name"], "uploads/" . $name);
            $spravceGalerie->ulozObrazek($_GET['kategorie'], $name, $_POST['popisek']);
            $this->pridejZpravu("Obrázek přidán AF");
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


    }
}