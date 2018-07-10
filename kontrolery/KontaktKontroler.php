<?php

class KontaktKontroler extends Kontroler
{

    public function zpracuj($parametry)
    {

        $this->hlavicka = array(
            'titulek' => 'Kontaktní formulář',
            'popis' => 'Kontaktní formulář random'
        );

        if (isset($_POST["email"])) {
            if ($_POST['rok'] == date("Y")) {
                $odesilacEmailu = new odesilacEmailu();
                $odesilacEmailu->odesli("tompazourek98@seznam.cz", "Email z weee", $_POST['zprava'], $_POST['email']);
            }
        }

        $this->pohled = 'kontakt';
    }
}