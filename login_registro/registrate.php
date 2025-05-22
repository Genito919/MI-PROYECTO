<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos y sanitizamos los datos del formulario
    $nombre_usuario = isset($_POST['nombre_usuario']) ? filter_var(strtolower(trim($_POST['nombre_usuario'])), FILTER_SANITIZE_STRING) : '';
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $password2 = isset($_POST['password2']) ? $_POST['password2'] : '';

    $errores = '';

    // Validación básica
    if (empty($nombre_usuario) || empty($email) || empty($password) || empty($password2)) {
        $errores .= '<li>Por favor, completa todos los campos.</li>';
    } else {
        try {
            // Conexión a la base de datos
            $conexion = new PDO('mysql:host=localhost;dbname=proyecto_bloger', 'root', '1920');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }

        // Verificar si el nombre de usuario o email ya existe
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario OR email = :email LIMIT 1');
        $statement->execute([
            ':usuario' => $nombre_usuario,
            ':email' => $email
        ]);
        $resultado = $statement->fetch();

        if ($resultado != false) {
            $errores .= '<li>El nombre de usuario o email ya está en uso.</li>';
        }

        // Encriptar contraseñas y validar coincidencia
        $password_hash = hash('sha512', $password);
        $password2_hash = hash('sha512', $password2);

        if ($password_hash != $password2_hash) {
            $errores .= '<li>Las contraseñas no coinciden.</li>';
        }
    }

    // Si no hay errores, insertamos el nuevo usuario
    if ($errores == '') {
        $statement = $conexion->prepare(
            'INSERT INTO usuarios (usuario, email, password) 
             VALUES (:usuario, :email, :password)'
        );
        $statement->execute([
            ':usuario' => $nombre_usuario,
            ':email' => $email,
            ':password' => $password_hash
        ]);

        header('Location: login.php');
        exit;
    }
}

require 'views/registrate.view.php';
