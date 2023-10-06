<?php

abstract class Bankkonto 
{
    
public $name;

public $firstname;

public $surename;
public $kntnr;
private $credit ;



public function getCredit()
{
    return $this->credit;
}


public function buchung($betrag, $art)
    {
        if ($art == "einzahlung")
            $this->credit = $this->credit + $betrag;

        if ($art == "auszahlung" && $this->credit - $betrag >= 0)
        {
            $this->credit = $this->credit - $betrag;
        }
        
    }

    public function setCredit($credit)
    {
        $this->credit = $credit;
    }

}
