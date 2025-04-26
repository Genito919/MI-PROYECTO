<?php 
//CONEXION A LA BASE DE DATOS
function conexion($bd_config){
    try {
        $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}

//FUNCION PARA LIMPIAR LOS DATOS
function limpiarDatos($datos){
    $datos = trim($datos); 
    $datos = stripslashes($datos); 
    $datos = htmlspecialchars($datos); 
    return $datos;
}

//FUNCION PARA OBTENER LA PÁGINA ACTUAL
function pagina_actual(){
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

//FUNCION PARA OBTENER LOS POST
function obtener_post($post_por_pagina, $conexion){
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;

    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT :inicio, :post_por_pagina");
    $sentencia->bindParam(':inicio', $inicio, PDO::PARAM_INT);
    $sentencia->bindParam(':post_por_pagina', $post_por_pagina, PDO::PARAM_INT);
    $sentencia->execute();
    return $sentencia->fetchAll();
}


//FUNCION PARA OBTENER EL NÚMERO DE PÁGINAS
function numero_paginas($post_por_pagina, $conexion) {
    $total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
    $total_post->execute();
    $total_post = $total_post->fetch()['total'];
    return ceil($total_post / $post_por_pagina); 
}

//FUNCION PARA LIMPIAR Y OBTENER EL ID DEL ARTÍCULO
function id_articulo($id){
    return (int)limpiarDatos($id);
}

//FUNCION PARA OBTENER LOS POST POR ID
function obtener_post_por_id($conexion, $id){
    $resultado = $conexion->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");
    return ($resultado) ? $resultado->fetchAll() : false;
}

//FUNCION PARA FORMATEAR LA FECHA
/*function fecha($fecha) {
    $timestamp = strtotime($fecha);
    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);
    return "$dia de " . $meses[$mes] . " del $year";
}*/
?>
