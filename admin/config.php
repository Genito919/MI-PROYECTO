<?php

define('RUTA','http://192.168.10.10/curso_php/practica/MI_PROYECTO/'); 
$bd_config = array(
    'basedatos' => 'proyecto_bloger',
    'usuario' => 'root',
    'pass' => '1920'
);

$blog_config = array(
    'post_por_pagina' => '9',
    'carpeta_imagenes' => 'http://192.168.10.10/curso_php/practica/MI_PROYECTO/videos/' //para traer videos de mysql deves cambiar la ruta aqui y en la base de datos
);

$blog_admin = array( //PONER EL LOGIN CREADO
    'usuario' => 'yo',
    'password' => '123'
);