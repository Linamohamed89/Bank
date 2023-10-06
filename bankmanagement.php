<?php

include('functions.php');

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$conn = createMySQLConnection();

$res = $conn->query("SELECT * FROM accounts");
?>
<html>
    <head>
    </head>
    <body>
        <p><h1>Miene Bank</h1></p>
        
        <?php //var_dump($accountData); ?>
        <form action="delete.php" method="post">
        <table border ="1">
            <tr>
                <td>Auswahl</td>
                <td>id</td>
                <td>firstname</td>
                <td>surename</td>
                <td>email</td>
                <td>girokonto_id</td>
                <td>sparbuch_id</td>
                
                <td>Funktionen</td>
            </tr>
            
            <?php
            while ($row = $res->fetch_assoc())
            {
                echo "<tr>";
                echo "<td><input type=\"checkbox\" name=\"". $row['id']. "\" /></td>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['firstname']."</td>";
                echo "<td>".$row['surename']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['girokonto_id']."</td>";
                echo "<td>".$row['sparbuch_id']."</td>";
                echo "<td> Bearbeiten</td>";
                echo "</tr>";
            }           
            ?>
            
        </table>
        <input type="submit" name="save" />
        </form>
    </body>
</html>