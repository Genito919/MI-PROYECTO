<?php 
// CONEXIÓN A LA BASE DE DATOS
function conexion($bd_config){
    try {
        $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}

// FUNCIÓN PARA LIMPIAR LOS DATOS
function limpiarDatos($datos){
    $datos = trim($datos); // Elimina espacios.
    $datos = stripslashes($datos); // Elimina barras invertidas.
    $datos = htmlspecialchars($datos); // Convierte caracteres especiales.
    return $datos;
}

// FUNCIÓN PARA OBTENER LA PÁGINA ACTUAL
function pagina_actual(){
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

// FUNCIÓN PARA OBTENER LOS POSTS ORDENADOS POR FECHA (MÁS RECIENTES PRIMERO)
function obtener_post($post_por_pagina, $conexion){
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos ORDER BY fecha DESC LIMIT $inicio, $post_por_pagina");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

// FUNCIÓN PARA OBTENER EL NÚMERO TOTAL DE PÁGINAS
function numero_paginas($post_por_pagina, $conexion) {
    $total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
    $total_post->execute();
    $total_post = $total_post->fetch()['total'];
    return ceil($total_post / $post_por_pagina); 
}

// FUNCIÓN PARA LIMPIAR Y OBTENER EL ID DEL ARTÍCULO
function id_articulo($id){
    return (int)limpiarDatos($id);
}

// FUNCIÓN PARA OBTENER UN POST POR ID
function obtener_post_por_id($conexion, $id){
    $resultado = $conexion->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");
    return ($resultado) ? $resultado->fetchAll() : false;
}

// FUNCIÓN PARA OBTENER TODOS LOS VIDEOS
function obtener_todos_los_videos($conexion){
    $consulta = $conexion->prepare("SELECT * FROM articulos ORDER BY fecha DESC");
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

// FUNCIÓN PARA OBTENER COMENTARIOS POR ID DE ARTÍCULO
function obtener_comentarios_por_post_id($conexion, $articulo_id) {
    $statement = $conexion->prepare('SELECT usuario, comentario, fecha FROM comentarios WHERE articulo_id = :id ORDER BY fecha DESC');
    $statement->execute([':id' => $articulo_id]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// FUNCIÓN PARA AGREGAR UN COMENTARIO NUEVO
function agregar_comentario($conexion, $articulo_id, $usuario, $comentario) {
    $statement = $conexion->prepare('INSERT INTO comentarios (articulo_id, usuario, comentario) VALUES (:articulo_id, :usuario, :comentario)');
    $result = $statement->execute([
        ':articulo_id' => $articulo_id,
        ':usuario' => $usuario,
        ':comentario' => $comentario
    ]);
    if (!$result) {
        $errorInfo = $statement->errorInfo();
        echo "Error en la consulta: " . $errorInfo[2];
    }
    return $result;
}


/*
// FUNCIÓN PARA FORMATEAR LA FECHA (OPCIONAL)
function fecha($fecha) {
    $timestamp = strtotime($fecha);
    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);
    return "$dia de " . $meses[$mes] . " del $year";
}
*/
?>



