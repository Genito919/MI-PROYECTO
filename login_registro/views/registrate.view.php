<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registro - TravelBlogs</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Roboto&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-['Raleway',sans-serif] min-h-screen flex items-center justify-center p-4">

  <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-8">
    <h1 class="text-3xl font-bold text-blue-600 mb-6 text-center">Regístrate</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="space-y-5" name="registro">

      <!-- Usuario -->
      <div>
        <label for="nombre_usuario" class="block text-gray-700 font-semibold mb-1">Usuario</label>
        <div class="relative">
          <input
            type="text"
            id="nombre_usuario"
            name="nombre_usuario"
            placeholder="Nombre de usuario"
            required
            value="<?php echo isset($_POST['nombre_usuario']) ? htmlspecialchars($_POST['nombre_usuario']) : ''; ?>"
            class="w-full pl-10 pr-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-600"
          />
          <i class="fas fa-user-circle absolute left-3 top-2.5 text-gray-400"></i>
        </div>
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-gray-700 font-semibold mb-1">Correo electrónico</label>
        <div class="relative">
          <input
            type="email"
            id="email"
            name="email"
            placeholder="email@ejemplo.com"
            required
            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
            class="w-full pl-10 pr-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-600"
          />
          <i class="fas fa-envelope absolute left-3 top-2.5 text-gray-400"></i>
        </div>
      </div>

      <!-- Contraseña -->
      <div>
        <label for="password" class="block text-gray-700 font-semibold mb-1">Contraseña</label>
        <div class="relative">
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Contraseña"
            required
            class="w-full pl-10 pr-10 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-600"
          />
          <i class="fas fa-lock absolute left-3 top-2.5 text-gray-400"></i>
          <button
            type="button"
            onclick="togglePassword('password')"
            class="absolute right-3 top-2.5 text-gray-500 hover:text-blue-600 focus:outline-none"
          >
            <i class="fas fa-eye" id="togglePassword-password"></i>
          </button>
        </div>
      </div>

      <!-- Repetir contraseña -->
      <div>
        <label for="password2" class="block text-gray-700 font-semibold mb-1">Repetir contraseña</label>
        <div class="relative">
          <input
            type="password"
            id="password2"
            name="password2"
            placeholder="Repite tu contraseña"
            required
            class="w-full pl-10 pr-10 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-600"
          />
          <i class="fas fa-lock absolute left-3 top-2.5 text-gray-400"></i>
          <button
            type="button"
            onclick="togglePassword('password2')"
            class="absolute right-3 top-2.5 text-gray-500 hover:text-blue-600 focus:outline-none"
          >
            <i class="fas fa-eye" id="togglePassword-password2"></i>
          </button>
        </div>
      </div>

      <!-- Aceptar términos -->
      <div class="flex items-center space-x-2">
        <input
          type="checkbox"
          id="terminos"
          name="terminos"
          required
          class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-400"
          <?php echo isset($_POST['terminos']) ? 'checked' : ''; ?>
        />
        <label for="terminos" class="text-gray-700 text-sm select-none">
          Acepto los <a href="#" class="text-blue-600 hover:underline">términos y condiciones</a>
        </label>
      </div>

      <!-- Errores -->
      <?php if (!empty($errores)) : ?>
        <div class="bg-red-100 text-red-700 border border-red-400 rounded p-3 text-sm">
          <?php echo $errores; ?>
        </div>
      <?php endif; ?>

      <!-- Botón submit -->
      <button
        type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-md transition duration-300 flex justify-center items-center space-x-2"
      >
        <span>Registrarme</span> <i class="fas fa-arrow-right"></i>
      </button>
    </form>

    <p class="mt-6 text-center text-gray-600 text-sm">
      ¿Ya tienes cuenta?
      <a href="login.php" class="text-blue-600 hover:underline font-semibold">Inicia sesión</a>
    </p>
  </div>

  <script>
    function togglePassword(id) {
      const input = document.getElementById(id);
      const icon = document.getElementById('togglePassword-' + id);
      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    }
  </script>
</body>
</html>
