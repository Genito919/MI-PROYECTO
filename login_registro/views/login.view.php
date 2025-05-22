<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Iniciar Sesión</title>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-raleway min-h-screen flex items-center justify-center p-4">
  <div class="bg-white shadow-lg rounded-lg max-w-md w-full p-8">
    <h1 class="text-4xl font-bold text-center mb-6 text-blue-700 tracking-wide">Iniciar Sesión</h1>
    <hr class="border-blue-700 mb-6" />

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login" class="space-y-6">

      <div class="relative">
        <i class="fa fa-user absolute left-3 top-3 text-gray-400"></i>
        <input
          type="text"
          name="usuario"
          placeholder="Ingresa usuario o correo"
          class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
          required
          value="<?php echo isset($_POST['usuario']) ? htmlspecialchars($_POST['usuario']) : ''; ?>"
        />
      </div>

      <div class="relative">
        <i class="fa fa-lock absolute left-3 top-3 text-gray-400"></i>
        <input
          id="password"
          type="password"
          name="password"
          placeholder="Contraseña"
          class="pl-10 pr-10 py-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
          required
        />
        <button
          type="button"
          onclick="togglePassword()"
          class="absolute right-3 top-3 text-gray-600 hover:text-blue-700 focus:outline-none"
          aria-label="Mostrar/Ocultar contraseña"
        >
          <i id="eyeIcon" class="fa fa-eye"></i>
        </button>
      </div>

      <div class="flex justify-end">
        <button
          type="submit"
          class="bg-blue-700 text-white px-6 py-3 rounded-md hover:bg-blue-800 transition"
        >
          Entrar <i class="fa fa-arrow-right ml-2"></i>
        </button>
      </div>

      <?php if (!empty($errores)): ?>
      <div class="bg-red-100 text-red-700 border border-red-400 p-3 rounded mt-4">
        <ul>
          <?php echo $errores; ?>
        </ul>
      </div>
      <?php endif; ?>
    </form>

    <p class="mt-8 text-center text-gray-700 text-lg">
      ¿Aún no tienes cuenta?
      <a href="registrate.php" class="text-blue-700 font-semibold hover:underline">Regístrate</a>
    </p>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const eyeIcon = document.getElementById('eyeIcon');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
      }
    }
  </script>
</body>
</html>



