<?php 

session_start(); // ¡Muy importante para usar $_SESSION!

require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);
$id_articulo = id_articulo($_GET['id']);

if(!$conexion){
    header('Location: error.php');
    exit;
}

if(empty($id_articulo)){
    header('Location: index.php');
    exit;
}

$post = obtener_post_por_id($conexion, $id_articulo);

if (!$post){
    header('Location: index.php');
    exit;
}

$post = $post[0];

// Definimos si el usuario está logueado
$usuario_logueado = isset($_SESSION['usuario']) && !empty($_SESSION['usuario']);

// Manejo de envío de comentarios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $usuario_logueado ? $_SESSION['usuario'] : '';

    $comentario = isset($_POST['comentario']) ? limpiarDatos($_POST['comentario']) : '';

    if ($usuario && $comentario) {
        agregar_comentario($conexion, $id_articulo, $usuario, $comentario);
        header("Location: single.php?id=$id_articulo");
        exit;
    } else {
        // Aquí podrías manejar un flag para la vista para mostrar el modal si quieres que aparezca tras intento fallido
        // Pero mejor se controla en el front porque el formulario no enviará si no está logueado
    }
}

$videos = obtener_todos_los_videos($conexion);
$comentarios = obtener_comentarios_por_post_id($conexion, $id_articulo);

// Pasamos la variable a la vista
require 'views/single.view.php';

?>


