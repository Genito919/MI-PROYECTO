<?php

define('RUTA', '/PROYECTO/'); // Ruta base relativa simple

$bd_config = array(
    'basedatos' => 'proyecto_bloger',
    'usuario' => 'root',
    'pass' => '1920'
);

$blog_config = array(
    'post_por_pagina' => '6',
    'carpeta_imagenes' => 'videos/' // Ruta relativa al directorio del proyecto
);

$blog_admin = array(
    'usuario' => 'yo',
    'password' => '123'
);
