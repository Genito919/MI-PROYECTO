<?php 

require 'admin/config.php'; //LLAMA AL LOGIN
if (!isset($bd_config)) {
    die("Error: 'bd_config' no está definido en config.php");
}

if (!isset($blog_config)) {
    die("Error: 'blog_config' no está definido en config.php");
}


require 'functions.php'; //LLAMA A LAS FUNCIONES

$conexion = conexion($bd_config); //LLAMA A LA CONEXION
if(!$conexion) {
    header('Location: error.php');
}

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);

if(!$posts){
    header('Location: error.php');
}

require 'views/index.view.php';


?>
