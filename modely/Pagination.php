<?php
/**
 * Created by PhpStorm.
 * User: TomPa
 * Date: 26.06.2018
 * Time: 16:55
 */

class Pagination
{
    private $results_per_page = 5;
    public $current_page = 1;
    public $next_page = 0;
    public $previous_page = 0;

    //nastavi maximalni pocet clanku na strance
    public function setResultsPerPage($newNumber)
    {
        $this->results_per_page = $newNumber;
    }

    //vrati maximalni pocet clanku na strance
    public function getResultsPerPage()
    {
        return $this->results_per_page;
    }

    //vrati pocet clanku z tabulky '$table' podle 'id'
    public function numberOfResultsInTable($table, $idColumnName)
    {
        $stm = ("SELECT " . "$idColumnName" . " FROM " . "$table");
        return Db::execDb($stm);
    }

    //cislo od ktereho bude startovat 1. clanek na strance
    //
    //  (curr_page - 1)* results_per_page = startovaci cislo clanku
    //  PRIKLAD:
    //      (1-1) * 10 = 0 --> zacatek od nuly
    //      (3-1) * 10 = 20 -> zacatek od 20
    //
    public function determineArticleStart()
    {
        return ($this->current_page - 1) * $this->getResultsPerPage();
    }

    //vrati celkovy pocet stranek
    public function totalPages($numOfArticles)
    {
        return ceil($numOfArticles / $this->getResultsPerPage());
    }

    public function updatePages($page, $pocetStranek)
    {
        $this->current_page = $page;
        if ($this->current_page < 1)
            $this->current_page = 1;

        if ($this->current_page >= $pocetStranek)
            $this->current_page = $pocetStranek;


        $this->previous_page = $this->next_page = $this->current_page;
        $this->previous_page--;
        $this->next_page++;

        if ($this->next_page >= $pocetStranek)
            $this->next_page = $pocetStranek;

        if ($this->previous_page <= 0)
            $this->previous_page = 1;

    }

    //Vrati pocet clanku "results_per_page", zacinajic od "ArticleStart"
    public function getLimitedArticles()
    {
        /*  return Db::dotazVsechny("
              SELECT `clanky_id`, `titulek`, `url`, `popisek`,`time_stamp`
              FROM `clanky`
              ORDER BY clanky_id DESC
              LIMIT " . $this->determineArticleStart() .','. "$this->results_per_page"."
              "
              );*/
        return Db::dotazVsechny("
			SELECT `clanky_id`, `titulek`, `url`, `popisek`,`time_stamp`
			FROM `clanky`
			ORDER BY clanky_id DESC 
			LIMIT ?,? ", array($this->determineArticleStart(), $this->results_per_page
        ));
    }


}