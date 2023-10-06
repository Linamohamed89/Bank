<?php

include('Bankkonto.php');
include('Girokonto.php');
include('Sparbuch.php');

//verbinde dich mit einer Datenbank und hole den Kontostand
/*
1. erstelle eine verbundung $conn=mysqli_connect($serverName,$userName,$password);
2. wenn alles ok, dann wähle die datenbnaknamen: $conn->select_db("bankomat");
3. query abfeuern: $res = $conn->query("SELECT * FROM accounts as acc, sparbue ....);
4. bekommen wir eine resource $res
5. verarbeiten wir die Ergebnisse der Datenbankabfrage while ($row = $res->fetch_array()){var_dump($row);}
*/

$serverName='localhost';
$userName='root';
$password='';

$conn=mysqli_connect($serverName,$userName,$password);
if(!$conn)
{
    die('There is problem connection'.mysqli_connect_error());
}

$conn->select_db("bankomat");

//SELECT * FROM accounts;
//SELECT * FROM accounts WHERE account_nr = 123
//SELECT * FROM accounts WHERE name LIKE "%va%"
//SELECT * FROM accounts WHERE name LIKE "%va%" AND account_nr = 123
//SELECT * FROM accounts WHERE name LIKE "%va%" OR account_nr = 123
//SELECT * FROM accounts WHERE name LIKE "%va%" OR account_nr = 123 AND id=1
//SELECT accounts.id, name.accounts FROM accounts;
//SELECT acc.id, acc.name FROM accounts as acc WHERE acc.id=1;
//SELECT SUMME(credit) FROM accounts WHERE credit > 1000000;


$res = $conn->query("SELECT * FROM accounts as acc, girokonten as gc WHERE acc.girokonto_id = gc.id AND acc.id = 1");

while ($row = $res->fetch_assoc())
{
    $accountData = $row;
}

$kontostand = $accountData['balance'];


$myAccount = new Girokonto($accountData['surename'], $accountData['firstname']);
$myAccount->setCredit($kontostand);

$myAccount->einzahlung($_POST['betrag_einzahlung']);

//$myAccount->auszahlung($_POST['betrag_post']);

?>

<html>
    <head>
    </head>
    <body>
        <p><h1>Unsere Bankkonten</h1></p>
        <p>Das ist ein <?php echo $myAccount->name; ?></p>
        <p>Inhaber: <?php echo $myAccount->surename; ?>, <?php echo $myAccount->firstname; ?></p>
        <p>Guthaben: <?php echo $myAccount->getCredit(); ?></p>


        <form action="" method="POST">
            <input type="text" value="0" name="betrag_einzahlung"/>
            <input type="submit" value="Einzahlung"/>
        </form>

        <form action="" method="POST">
            <input type="text" value="0" name="betrag_post"/>
            <input type="submit" value="Auszahlung"/>
        </form>

    </body>
</html>

<?php
//verbinde dich mit einer DB und speichere denaktuelen Kontostand

?>