<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_medico";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
    die("fallo la conexion:" . $conn->connect_error);
}
echo "";


?>