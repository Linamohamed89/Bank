<?php

class Sparbuch extends Bankkonto
{

    function __construct()
    {
        $this->name = "Sparbuch";
    }

    public function einzhalung()
    {
        
    }

    function setCredit($credit)
    {
        $this->credit = $credit;
    }
    
}
