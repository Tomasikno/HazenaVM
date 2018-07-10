<?php


// Třída poskytuje metody pro správu článků v redakčním systému
class SpravceClanku
{

    // Vrátí článek z databáze podle jeho URL
    public function vratClanek($url)
    {
        return Db::dotazJeden('
			SELECT `clanky_id`, `titulek`, `obsah`, `url`, `popisek`, `time_stamp`
			FROM `clanky` 
			WHERE `url` = ?
		', array($url));
    }

    // Uloží článek do systému. Pokud je ID false, vloží nový, jinak provede editaci.
    public function ulozClanek($id, $clanek)
    {
        if (!$id)
            Db::vloz('clanky', $clanek);
        else
            Db::zmen('clanky', $clanek, 'WHERE clanky_id = ?', array($id));
    }

    // Vrátí seznam článků v databázi
    public function vratClanky()
    {
        return Db::dotazVsechny('
			SELECT `clanky_id`, `titulek`, `url`, `popisek`,`time_stamp`
			FROM `clanky` 
			ORDER BY `clanky_id` DESC
		');
    }

    public function vratNejnovejsiClanek()
    {
        $clanky = Db::dotazVsechny('
			SELECT `clanky_id`, `titulek`, `url`, `popisek`,`time_stamp`
			FROM `clanky` 
			ORDER BY `clanky_id` DESC
		');
        return $clanky[0];
    }

    // Odstraní článek
    public function odstranClanek($url)
    {
        Db::dotaz('
			DELETE FROM clanky
			WHERE url = ?
		', array($url));
    }

}