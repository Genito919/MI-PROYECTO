<?php 

require 'admin/config.php'; 
require 'Functions.php'; 

$conexion = conexion($bd_config);
if(!$conexion) {
    header('Location: error.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])) {
    $busqueda = limpiarDatos($_GET['busqueda']);
    
    $statement = $conexion->prepare(
        'SELECT * FROM articulos WHERE titulo LIKE :busqueda OR descripcion LIKE :busqueda'
    );
    $statement->execute(array(':busqueda' => "%$busqueda%"));
    $resultados = $statement->fetchAll();
    
    $titulo = empty($resultados) ? 
              'No se encontraron artículos con el resultado: ' . $busqueda : 
              'Resultados de la búsqueda: ' . $busqueda;
} else {
    header('Location: ' . RUTA . '/index.php');
    exit;
}

require 'views/buscar.view.php';

?>
