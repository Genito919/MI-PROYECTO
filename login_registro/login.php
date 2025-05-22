<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['usuario']) || empty($_POST['password'])) {
        $errores .= '<li>Por favor completa todos los campos.</li>';
    } else {
        $usuario = filter_var(strtolower(trim($_POST['usuario'])), FILTER_SANITIZE_STRING);
        $password = hash('sha512', $_POST['password']);

        try {
            $conexion = new PDO('mysql:host=localhost;dbname=proyecto_bloger', 'root', '1920');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conexion->prepare('SELECT * FROM usuarios WHERE (usuario = :usuario OR email = :usuario) AND password = :password');
            $stmt->execute([
                ':usuario' => $usuario,
                ':password' => $password
            ]);

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado !== false) {
                $_SESSION['usuario'] = $resultado['usuario'];
                header('Location: index.php');
                exit;
            } else {
                $errores .= '<li>Usuario o contraseña incorrectos.</li>';
            }
        } catch (PDOException $e) {
            $errores .= '<li>Error en la conexión a la base de datos: ' . htmlspecialchars($e->getMessage()) . '</li>';
        }
    }
}

require 'views/login.view.php';

