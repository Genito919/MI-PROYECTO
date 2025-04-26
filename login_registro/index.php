<?php session_start();

if (isset($_SESSION['usuario'])) {
    header ('Location: http://192.168.10.9/curso_php/practica/SUBFAMILY/');
} else {
    header ('Location: registrate.php');

}

?>