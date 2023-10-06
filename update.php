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
//Verbindung zu bereits vorhandenen Kunden
$vorhandeneKunden = $conn->query("SELECT * FROM accounts");

//Foreach versuch
if (isset($_POST['email']))
{
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $surename = $_POST['surename'];
    $email = $_POST['email'];
    
    //$result = mysqli_query($conn, $query);
    $res = $conn->query("UPDATE accounts SET firstname='$firstname', surename='$surename', email='$email' WHERE id='$id'");
    if ($res)
    {
        
        echo "Data Updated in Database- Reloading Page in 7 sec.\n ";

        header('Refresh: 7, url=update.php');
    //    header('Refresh: 5; url=update.php');
    }
    else 
    {
        echo "Data could not be Updated";
    }

}


?>

<html>
    <head>
    </head>
    <body>

        <h1>Kunden Ändern</h1>
        <form action="update.php" method="POST">
            <input type="text" placeholder="wähle id" name="id"/>
            <input type="text" placeholder="Neuer Vorname" name="firstname"/>
            <input type="text" placeholder="Neuer Nachname" name="surename"/>
            <input type="text" placeholder="Neue E-Mail Adresse" name="email"/>
            <input type="submit" value="update data"/>
        </form>

        <h3>
            <?php 
            foreach ($_POST as $key => $value) 
                {
                    echo "Feld wurde geändert: "." '".$key."' =>"." '".$value."'<";
                }    
            ?>
        </h3>
        
        <p><h1>Vorhandene Kunden</h1></p>
        <ul>
            <?php
                while ($row = $vorhandeneKunden->fetch_assoc())
                {
                    echo "<li>".$row["id"]." - ".$row["firstname"]." - ".$row["surename"]." - ".$row["email"]."</li>";
                }
            ?>
        </ul>

    </body>
</html>