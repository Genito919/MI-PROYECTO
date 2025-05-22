<?php require 'header.php'; ?>

<!-- Estilos de Plyr -->
<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

<div class="max-w-7xl mx-auto px-4 py-8">
  <!-- Contenedor FLEX para contenido principal + barra lateral -->
  <div class="flex flex-col md:flex-row gap-8">
    
    <!-- Contenido Principal -->
    <main class="w-full md:w-2/3 bg-white rounded-lg shadow-md p-6">
      <article>
        <div class="mb-6 rounded overflow-hidden shadow-lg bg-black">
          <video 
            id="player"
            class="w-full h-auto rounded-lg"
            poster="/PROYECTO/miniaturas/<?php echo htmlspecialchars($post['miniatura']); ?>"
            aria-label="Video: <?php echo htmlspecialchars($post['titulo']); ?>"
          >
            <source src="/PROYECTO/videos/<?php echo htmlspecialchars($post['video']); ?>" type="video/mp4" />
            Tu navegador no soporta la etiqueta de video.
          </video>
        </div>

        <h2 class="text-3xl font-semibold mb-2 text-gray-900"><?php echo htmlspecialchars($post['titulo']); ?></h2>
        <p class="text-sm text-gray-500 mb-4">Publicado por: <span class="font-medium text-gray-700"><?php echo htmlspecialchars($post['usuario']); ?></span></p>
        <p class="text-gray-700 whitespace-pre-line mb-6"><?php echo nl2br(htmlspecialchars($post['descripcion'])); ?></p>

        <!-- Botones de interacción -->
        <div class="flex flex-wrap gap-3 text-gray-700">
          <button class="flex items-center gap-2 px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-md transition">
            <i class="fa-solid fa-thumbs-up"></i> Me gusta
          </button>
          <button class="flex items-center gap-2 px-4 py-2 bg-red-100 hover:bg-red-200 text-red-700 rounded-md transition">
            <i class="fa-solid fa-thumbs-down"></i> No me gusta
          </button>
          <button class="flex items-center gap-2 px-4 py-2 bg-green-100 hover:bg-green-200 text-green-700 rounded-md transition">
            <i class="fa-solid fa-bell"></i> Suscribirse
          </button>
          <button class="flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-md transition">
            <i class="fa-solid fa-share"></i> Compartir
          </button>
        </div>
      </article>

      <!-- Sección de Comentarios -->
      <section class="mt-10">
        <h3 class="text-2xl font-semibold mb-4 text-gray-900">Comentarios</h3>

        <!-- Formulario para agregar comentario -->
        <form method="POST" action="single.php?id=<?php echo htmlspecialchars($post['id']); ?>" class="mb-6">
          <textarea name="comentario" rows="3" placeholder="Agrega un comentario público..." required
            class="w-full p-3 rounded border border-gray-300 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

          <button type="submit" class="mt-2 px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded transition">
            Comentar
          </button>
        </form>

        <!-- Lista de comentarios -->
        <div class="space-y-6 max-h-96 overflow-y-auto">
          <?php foreach($comentarios as $comentario): ?>
          <article class="border border-gray-200 rounded p-4 bg-gray-50">
            <header class="flex items-center gap-3 mb-2">
              <span class="font-semibold text-gray-800"><?php echo htmlspecialchars($comentario['usuario']); ?></span>
              <time class="text-xs text-gray-500" datetime="<?php echo $comentario['fecha']; ?>">
                <?php echo date('d M Y, H:i', strtotime($comentario['fecha'])); ?>
              </time>
            </header>
            <p class="text-gray-700 whitespace-pre-line"><?php echo nl2br(htmlspecialchars($comentario['comentario'])); ?></p>
          </article>
          <?php endforeach; ?>
        </div>
      </section>
    </main>

    <!-- Barra lateral tipo Pornhub 😎 -->
    <aside class="w-full md:w-1/3 bg-white rounded-lg shadow-md p-6 flex flex-col">
      <h2 class="text-2xl font-semibold mb-4 text-gray-900">Videos Recomendados</h2>
      <div class="overflow-y-auto flex-1 flex flex-col gap-2" style="max-height: 80vh;">
        <?php foreach($videos as $video): ?>
        <a href="/PROYECTO/single.php?id=<?php echo $video['id']; ?>"
          class="flex items-start gap-2 p-1 rounded hover:bg-gray-100 transition"
          title="<?php echo htmlspecialchars($video['titulo']); ?>">
          <img src="/PROYECTO/miniaturas/<?php echo htmlspecialchars($video['miniatura']); ?>"
            alt="Miniatura de <?php echo htmlspecialchars($video['titulo']); ?>"
            class="w-36 h-20 object-cover rounded" />
          <p class="text-gray-800 text-sm leading-tight line-clamp-2"><?php echo htmlspecialchars($video['titulo']); ?></p>
        </a>
        <?php endforeach; ?>
      </div>
    </aside>

  </div>
</div>

<!-- Modal de registro -->
<?php if ($mostrarModalRegistro): ?>
<div id="modalRegistro" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-lg shadow-lg w-96 p-6 relative">
    <button id="cerrarModal" class="absolute top-3 right-3 text-gray-600 hover:text-gray-900 text-xl font-bold">&times;</button>
    <h2 class="text-2xl font-semibold mb-4 text-gray-900">Regístrate para comentar</h2>
    <form action="/PROYECTO/login.php" method="POST" class="flex flex-col gap-4">
      <input type="text" name="usuario" placeholder="Usuario" required
             class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
      <input type="password" name="password" placeholder="Contraseña" required
             class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
      <button type="submit" class="bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Ingresar</button>
    </form>
    <p class="mt-4 text-sm text-gray-600">
      ¿No tienes cuenta? <a href="/PROYECTO/registro.php" class="text-blue-600 hover:underline">Regístrate aquí</a>.
    </p>
  </div>
</div>

<script>
  const modal = document.getElementById('modalRegistro');
  const cerrarBtn = document.getElementById('cerrarModal');

  cerrarBtn.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  // Opcional: cerrar modal clickeando fuera del contenido
  window.addEventListener('click', (e) => {
    if(e.target === modal){
      modal.style.display = 'none';
    }
  });
</script>
<?php endif; ?>

<!-- Script de Plyr -->
<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
<script>
  const player = new Plyr('#player', {
    controls: ['play', 'progress', 'current-time', 'mute', 'volume', 'settings', 'fullscreen'],
    settings: ['quality', 'speed'],
    autoplay: false
  });
</script>

<?php require 'footer.php'; ?>



