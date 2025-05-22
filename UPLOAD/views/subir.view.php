<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Subir Video</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&family=Roboto:wght@400;700&display=swap"
    rel="stylesheet"
  />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
  />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-raleway min-h-screen flex items-center justify-center p-6">
  <div class="bg-white max-w-lg w-full rounded-lg shadow-lg p-8">
    <header class="mb-8 text-center">
      <h1 class="text-4xl font-bold text-blue-700 tracking-wide">PUBLICAR</h1>
      <hr class="border-blue-700 mt-2" />
    </header>

    <form
      method="post"
      enctype="multipart/form-data"
      action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
      class="space-y-6"
    >
      <!-- Miniatura -->
      <div>
        <label
          for="foto"
          class="block mb-2 font-semibold text-gray-700"
          >Seleccionar Miniatura <span class="text-red-500">*</span></label
        >
        <input
          type="file"
          id="foto"
          name="foto"
          accept="image/*"
          required
          class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
        />
      </div>

      <!-- Video -->
      <div>
        <label
          for="video"
          class="block mb-2 font-semibold text-gray-700"
          >Seleccionar Video <span class="text-red-500">*</span></label
        >
        <input
          type="file"
          id="video"
          name="video"
          accept="video/*"
          required
          class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
        />
      </div>

      <!-- Título -->
      <div>
        <input
          type="text"
          id="titulo"
          name="titulo"
          placeholder="Título"
          required
          class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600"
        />
      </div>

      <!-- Usuario -->
      <div>
        <input
          type="text"
          id="usuario"
          name="usuario"
          placeholder="Usuario"
          required
          class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600"
        />
      </div>

      <!-- Categoría -->
      <div>
        <input
          type="text"
          id="categoria"
          name="categoria"
          placeholder="Categoría"
          required
          class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600"
        />
      </div>

      <!-- Descripción -->
      <div>
        <textarea
          id="descripcion"
          name="descripcion"
          placeholder="Ingresa una descripción"
          rows="4"
          required
          class="w-full border border-gray-300 rounded-md p-3 placeholder-gray-400 resize-none focus:outline-none focus:ring-2 focus:ring-blue-600"
        ></textarea>
      </div>

      <!-- Errores -->
      <?php if(isset($error)): ?>
      <p
        class="text-red-600 bg-red-100 border border-red-400 rounded p-3 text-center mb-4"
      >
        <?php echo $error; ?>
      </p>
      <?php endif; ?>

      <!-- Botón -->
      <div class="text-center">
        <button
          type="submit"
          class="bg-blue-700 text-white px-10 py-3 rounded-md font-semibold hover:bg-blue-800 transition inline-flex items-center justify-center"
        >
          <i class="fa fa-upload mr-2"></i> Subir
        </button>

        <?php if (!empty($mensaje_exito)): ?>
        <span
          class="ml-4 text-green-700 font-semibold"
          ><?php echo $mensaje_exito; ?></span
        >
        <?php endif; ?>
      </div>
    </form>
  </div>
</body>
</html>
