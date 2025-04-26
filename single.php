<?php 

require 'admin/config.php'; //LLAMA AL SINGLE

require 'functions.php'; //LLAMA A LAS FUNCIONES

$conexion = conexion($bd_config);
$id_articulo = id_articulo($_GET['id']);

if(!$conexion){
    header('Location: error.php');
}

if(empty($id_articulo)){
    header('Location: index.php');
}

//obtiene el post por id de la base de datos

$post = obtener_post_por_id($conexion, $id_articulo);

if (!$post){
    header('Location: index.php');
}

$post = $post[0];

require 'views/single.view.php';//LLAMA A LA VISTA


?>

