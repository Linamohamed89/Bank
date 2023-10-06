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

$serverName='localhost';
$userName='root';
$password='';

$conn=mysqli_connect($serverName,$userName,$password);
if(!$conn)
{
    die('There is problem connection'.mysqli_connect_error());
}

$conn->select_db("bankomat");

$res = $conn->query("INSERT INTO accounts (id, firstname, surename, email, girokonto_id, sparbuch_id) VALUES (NULL, '".$_POST['firstname']."', '".$_POST['surename']."', '".$_POST['email']."', NULL, NULL)");

?>

<html>
    <head>
    </head>
    <body>
        <p><h1>Kunden anlegen</h1></p>
        <form action="create.php" method="POST">
        <input type="text" placeholder="Vorname" name="firstname"/>
        <input type="text" placeholder="Nachname" name="surename"/>
        <input type="text" placeholder="E-Mail" name="email"/>
            <input type="submit" value="Erstellen"/>
        </form>
    </body>
</html>
<?php
//verbinde dich mit einer DB und speichere denaktuelen Kontostand

?>