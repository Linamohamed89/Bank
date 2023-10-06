<?php

include('Bankkonto.php');
include('Girokonto.php');
include('Sparbuch.php');
include('functions.php');

//verbinde dich mit einer Datenbank und hole den Kontostand
/*
1. erstelle eine verbundung $conn=mysqli_connect($serverName,$userName,$password);
2. wenn alles ok, dann wähle die datenbnaknamen: $conn->select_db("bankomat");
3. query abfeuern: $res = $conn->query("SELECT * FROM accounts as acc, sparbue ....);
4. bekommen wir eine resource $res
5. verarbeiten wir die Ergebnisse der Datenbankabfrage while ($row = $res->fetch_array()){var_dump($row);}
*/

$conn = createMySQLConnection();

if($_POST["save"] == "Senden")
{
    foreach ($_POST as $key => $value) {

        if ($key == "save") continue;
        
       $res = $conn->query("DELETE FROM accounts WHERE accounts.id =".$key);

    }
}


header("Location: bankmanagement.php");

?>