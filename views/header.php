<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>TravelBlogs</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300..800&family=Oswald:wght@200..700&display=swap" rel="stylesheet"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tu CSS adicional (opcional) -->
    <link rel="stylesheet" href="css/estilos.css"/>
</head>

<body class="bg-[#f9f9f9] text-[#111827] font-['Open_Sans']">

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<header class="w-full bg-white shadow-sm sticky top-0 z-50">
    <!-- Top bar: usuario/login -->
    <div class="max-w-7xl mx-auto px-4 py-2 flex justify-end items-center space-x-6 text-sm">
        <?php if (isset($_SESSION['usuario'])): ?>
            <div class="flex items-center space-x-2 text-[#3b82f6] font-semibold" aria-label="Usuario">
                <i class="fas fa-user-circle text-lg" aria-hidden="true"></i>
                <span><?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
            </div>
        <?php else: ?> 
            <a href="./login_registro/registrate.php" class="text-gray-600 hover:text-[#3b82f6] flex items-center space-x-1" aria-label="Registrarse">
                <i class="fas fa-user-plus" aria-hidden="true"></i><span>Regístrate</span>
            </a>
            <a href="./login_registro/login.php" class="text-gray-600 hover:text-[#3b82f6] flex items-center space-x-1" aria-label="Iniciar sesión">
                <i class="fas fa-user" aria-hidden="true"></i><span>Iniciar Sesión</span>
            </a>
        <?php endif; ?>
    </div>

    <!-- Logo y búsqueda -->
    <div class="border-t border-gray-100 py-4 bg-white">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-3xl font-bold tracking-tight text-[#3b82f6] whitespace-nowrap">
                <a href="<?php echo RUTA; ?>" class="hover:text-[#2563eb]" aria-label="Ir al inicio">TRAVELBLOGS</a>
            </div>

            <form name="busqueda" action="buscar.php" method="get" class="flex w-full md:w-1/2 border border-gray-300 rounded-md overflow-hidden shadow-sm focus-within:ring-2 focus-within:ring-[#3b82f6]">
                <input type="text" name="busqueda" placeholder="Buscar destinos, experiencias, videos..." class="w-full px-4 py-2 text-sm text-gray-800 focus:outline-none" />
                <button type="submit" class="bg-[#3b82f6] px-4 py-2 text-white hover:bg-[#2563eb] transition" aria-label="Buscar">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Navegación principal -->
    <nav class="bg-[#f0f4f8] border-t border-gray-200 shadow-sm sticky top-[94px] z-40">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <ul class="hidden md:flex space-x-8 text-sm font-semibold text-gray-700">
                <li><a href="index.php" class="hover:text-[#3b82f6] flex items-center space-x-1" aria-current="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'page' : 'false'; ?>"><i class="fa-solid fa-house"></i><span>INICIO</span></a></li>
                <li><a href="categorias/index.php" class="hover:text-[#3b82f6] flex items-center space-x-1"><i class="fa-solid fa-tags"></i><span>CATEGORIA</span></a></li>
                <li><a href="Reels/index.php" class="hover:text-[#3b82f6] flex items-center space-x-1"><i class="fa-brands fa-tiktok"></i><span>REELS</span></a></li>
            </ul>

            <!-- Botón menú móvil -->
            <button id="btn-menu" aria-label="Abrir menú" class="md:hidden text-gray-700 hover:text-[#3b82f6] focus:outline-none focus:ring-2 focus:ring-[#3b82f6]">
                <i class="fas fa-bars fa-lg"></i>
            </button>
        </div>

        <!-- Menú móvil oculto por defecto -->
        <div id="menu-movil" class="md:hidden bg-[#f0f4f8] border-t border-gray-200 hidden">
            <ul class="flex flex-col space-y-2 px-4 py-3 text-gray-700 font-semibold">
                <li><a href="index.php" class="hover:text-[#3b82f6] flex items-center space-x-2"><i class="fa-solid fa-house"></i><span>Inicio</span></a></li>
                <li><a href="categorias/index.php" class="hover:text-[#3b82f6] flex items-center space-x-2"><i class="fa-solid fa-tags"></i><span>Categoría</span></a></li>
                <li><a href="Reels/index.php" class="hover:text-[#3b82f6] flex items-center space-x-2"><i class="fa-brands fa-tiktok"></i><span>Reels</span></a></li>
            </ul>
        </div>
    </nav>
</header>

<script>
    // Toggle menú móvil
    const btnMenu = document.getElementById('btn-menu');
    const menuMovil = document.getElementById('menu-movil');

    btnMenu.addEventListener('click', () => {
        menuMovil.classList.toggle('hidden');
    });
</script>

