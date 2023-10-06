<?php

class Girokonto extends Bankkonto
{


    function __construct($surename, $firstname)
    {
        $this->name = "Girokonto";
        $this->firstname = $firstname;
        $this->surename = $surename;
    }

    public function einzahlung($betrag)
    {
        $this->buchung($betrag, "einzahlung");
    }

    public function auszahlung($credit)
    {
        $this->buchung($credit, "auszahlung");
    }

    public function ueberweisung()
    {

    }

}
