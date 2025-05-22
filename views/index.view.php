<?php require 'header.php'; ?>

<!-- Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Fondo general -->
<div class="min-h-screen bg-[#f9f9f9] py-10 px-4">

    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <?php foreach($posts as $post): ?>
        <div class="bg-white border border-gray-200 shadow-md hover:shadow-xl transition duration-300 p-6">

            <!-- Miniatura del video -->
            <a href="single.php?id=<?php echo $post['id']; ?>">
                <video 
                    class="w-full h-48 object-cover bg-gray-200 mb-4" 
                    poster="/PROYECTO/miniaturas/<?php echo $post['miniatura']; ?>">
                </video>
            </a>

            <!-- Título del video -->
            <h2 class="text-xl font-semibold text-gray-800 hover:text-blue-600 transition duration-200">
                <a href="single.php?id=<?php echo $post['id']; ?>">
                    <?php echo $post['titulo']; ?>
                </a>
            </h2>

            <!-- Usuario -->
            <p class="text-sm text-gray-500 mt-1">
                Publicado por <?php echo $post['usuario']; ?>
            </p>

            <!-- Descripción -->
            <p class="text-base text-gray-700 mt-2">
                <?php echo $post['descripcion']; ?>
            </p>

        </div>
        <?php endforeach; ?>

    </div>

</div>

<?php require 'paginacion.php'; ?>
<?php require 'footer.php'; ?>
