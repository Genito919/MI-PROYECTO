<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Simple</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300..800&family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
<?php session_start(); ?>

<header>
    <div class="navlogin">
        <div class="contenedor">
            <div class="links">
                <?php if (isset($_SESSION['usuario'])): ?>
                    <div class="usuario-conectado">
                        <div class="icono-usuario">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <span class="nombre-usuario">
                            <?php echo htmlspecialchars($_SESSION['usuario']); ?>
                        </span>
                    </div>
                <?php else: ?>
                    <a href="http://192.168.10.10/curso_php/practica/login&registro/registrate.php">
                        <i class="icono fas fa-user-plus"></i> Regístrate
                    </a>
                    <a href="http://192.168.10.10/curso_php/practica/login&registro/login.php">
                        <i class="icono fas fa-user"></i> Iniciar Sesión
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
        <div class="busqueda">
        <div class="contenedor2">
            <div class="logo">
                <p><a href="<?php echo RUTA; ?>">TRAVELBLOGS</a></p>
            </div>

            <form name="busqueda" class="buscar" action="buscar.php" method="get">
                <input type="text" name="busqueda" placeholder="Buscar">
                <button type="submit" class="icono">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
    </header>

    <div class="contenedor3">
            <nav class="menu">
                <ul>
                    <li><a href="http://192.168.10.10/curso_php/practica/MI_PROYECTO/"><i class="fa-solid fa-house"></i> Inicio</a></li>
                    <li><a href="http://192.168.10.10/curso_php/practica/Categoria_MP/"><i class="fa-solid fa-tags"></i> Categoría</a></li>
                    <li><a href="#"><i class="fa-brands fa-tiktok"></i> TikToSub</a></li>
                </ul>
            </nav>
    </div>

</body>
</html>