<?php
/**
 * Created by PhpStorm.
 * User: TomPa
 * Date: 23.01.2018
 * Time: 21:42
 */

class SpravceHraci
{
    // Vrátí článek z databáze podle jeho URL
    public function vratClanekHrac($url)
    {
        return Db::dotazJeden('
			SELECT `clanky_id`, `titulek`, `obsah`, `url`, `popisek`
			FROM `clanky_hraci` 
			WHERE `url` = ?
		', array($url));
    }

    // Uloží článek do systému. Pokud je ID false, vloží nový, jinak provede editaci.
    public function ulozClanekHrac($id, $clanek)
    {
        if (!$id)
            Db::vloz('clanky_hraci', $clanek);
        else
            Db::zmen('clanky_hraci', $clanek, 'WHERE clanky_id = ?', array($id));
    }

    // Vrátí seznam článků v databázi
    public function vratClankyHrac()
    {
        return Db::dotazVsechny('
			SELECT `clanky_id`, `titulek`, `url`, `popisek`
			FROM `clanky_hraci` 
			ORDER BY `clanky_id` DESC
		');
    }

    // Odstraní článek
    public function odstranClanekHrac($url)
    {
        Db::dotaz('
			DELETE FROM clanky_hraci
			WHERE url = ?
		', array($url));
    }
}