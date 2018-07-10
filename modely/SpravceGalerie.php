<?php

class SpravceGalerie
{

    public function vratKategorie()
    {
        return Db::dotazVsechny("SELECT * FROM fotky_kategorie ORDER BY kategorie_id DESC ");
    }

    public function vratKategorii($kategorie_id)
    {
        return Db::dotazVsechny("SELECT * FROM galerie_foto WHERE foto_kategorie=?", array($kategorie_id));
    }

    public function ulozKategorii($kategorie_nazev)
    {
        $exist = Db::dotazJeden("SELECT kategorie_jmeno FROM fotky_kategorie WHERE kategorie_jmeno=?", array($kategorie_nazev));
        if ($exist)
            throw new Exception("Kategorie již existuje");
        Db::dotaz("INSERT INTO fotky_kategorie(kategorie_jmeno) VALUES(?)", array($kategorie_nazev));
    }

    public function ulozObrazek($kategorie_id, $obrazek, $popisek)
    {
        Db::dotaz("INSERT INTO galerie_foto(foto_nazev,foto_popisek,foto_kategorie) VALUES(?,?,?)", array($obrazek, $popisek, $kategorie_id));
    }

    public function smazObrazek($obrazek_id)
    {
        $obr = Db::dotazJeden("SELECT foto_nazev FROM galerie_foto WHERE foto_id=?", array($obrazek_id));
        Db::dotaz("DELETE FROM galerie_foto WHERE foto_id=?", array($obrazek_id));
        unlink("uploads/" . $obr['foto_nazev']);
    }

    public function vratNahledKategorie($kategorie_id)
    {
    }

    public function smazKateogrii($kateogrie_id)
    {
        $obrazky = Db::dotazVsechny("SELECT foto_nazev,foto_id FROM galerie_foto WHERE foto_kategorie=?", array($kateogrie_id));
        foreach ($obrazky as $obr) {
            Db::dotaz("DELETE FROM galerie_foto WHERE foto_id=?", array($obr['foto_id']));
            unlink("uploads/" . $obr['foto_nazev']);
        }
        Db::dotaz("DELETE FROM fotky_kategorie WHERE kategorie_id=?", array($kateogrie_id));
    }







//    ///vrátí všechny kategorie
//    public function vratKategorie()
//    {
//        return Db::dotazVsechny('
//            SELECT `kategorie_id`,`kategorie_jmeno`
//            FROM `foto_kategorie`
//            ORDER BY `kategorie_id` DESC
//            ');
//    }
//
//    ///vytovří kategorii
//    public function vytvorKategorii($kategorieJmeno)
//    {
//        $kategorie = $this->vratKategorie();
//        foreach ($kategorie as $item) {
//            //pokud kategorie již existuje, vyhodí chybu
//            if ($item === $kategorieJmeno) {
//                throw new ChybaUzivatele();
//                //pokud neexistuje, vytvoří novou kategorii
//            } else {
//                Db::vloz('foto_kategorie', $kategorieJmeno);
//            }
//        }
//    }
//
//    ///smaže kategorii
//    public function smazKategorii($nazevKategorie)
//    {
//        Db::dotaz('
//        DELETE FROM `fotky_kategorie`
//        WHERE kategorie_nazev = ?
//        ', $nazevKategorie);
//    }
//    ///vrati vsechny fotky
//    public function vratFotky()
//    {
//        return Db::dotazVsechny('
//            SELECT `foto_id`,`foto_nazev`,`foto_popisek`,`time_stamp`
//            FROM `galerie_foto`
//            ORDER BY `foto_id` DESC
//        ');
//    }
//    public function vlozFotku($kategorie,$parametry){
//
//    }
}