<?php
function createMySQLConnection()

{
    $serverName='localhost';
    $userName='root';
    $password='';

    $conn=mysqli_connect($serverName,$userName,$password);
    if(!$conn)
        {
            die('There is problem connection'.mysqli_connect_error());
        }

    $conn->select_db("bankomat");
    return $conn;
}



?>