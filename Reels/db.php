<?php
$servername = "localhost";  
$username = "root";         
$password = "1920";            
$database = "subfamily";   


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>
