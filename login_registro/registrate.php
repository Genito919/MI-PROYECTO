<?php session_start();

if (isset($_SESSION['usuario'])) {
    header('location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $errores = '';

    if (empty($usuario) or empty($password) or empty($password2)) {
        $errores .= '<li>Ingresa Los Datos Correctamente</li>';
    } else {
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=usuarios', 'root', '1920');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    
        // Corregimos el nombre de la consulta SQL y el parámetro
        $statement = $conexion->prepare('SELECT * FROM registro_usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $usuario)); // Corregido el nombre del parámetro
        $resultado = $statement->fetch();
    
        if ($resultado != false) {
            $errores .='<li>El Nombre De Usuario Ya Existe</li>' ;
        }

        $password = hash('sha512', $password);
        $password2 = hash('sha512', $password2);

        if ($password != $password2) {
            $errores .= '<li/>Las Contraseñas No Coninciden<li>';

        }

        // echo "$usuario . $password . $password2";
    }

    if ($errores == '') {
        $statement = $conexion->prepare('INSERT INTO registro_usuarios (id, usuario, pass) VALUES (null, :usuario, :pass)');
        $statement->execute(array(
                ':usuario' => $usuario,
                ':pass' => $password
         ));

        header('Location: login.php');
    } 
    
}

require 'views/registrate.view.php'; 
?>