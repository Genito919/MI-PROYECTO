<?php require '../views/header.php'; ?>
<!-- Sección 4 Contenido -->
<div class="contenedor9">
    <?php 
    // Función para formatear nombres de categorías
    function formatearNombreCategoria($nombre) {
        return ucwords(str_replace('_', ' ', $nombre)); // Reemplaza _ por espacio y capitaliza
    }

    $categorias = [];  // Array para almacenar las categorías y sus videos

    // Agrupar videos por categorías
    foreach ($posts as $post) {
        if (!isset($categorias[$post['categoria']])) { // Cambiar 'categorias' por 'categoria'
            $categorias[$post['categoria']] = [];
        }
        $categorias[$post['categoria']][] = $post; // Añadimos el post (video) a su categoría
    }

    // Mostrar categorías y limitar los videos a 2 por categoría
    foreach ($categorias as $categoria => $videos): ?>
        <div class="post">
            <article>
                <h2 class="titulo"><?php echo formatearNombreCategoria($categoria); ?></h2> <!-- Nombre formateado -->

                <?php 
                // Limitamos los videos a 2 por categoría
                $videos_mostrados = array_slice($videos, 0, 2); 
                foreach ($videos_mostrados as $video): ?>
                    <p class="fecha"><?php echo $video['titulo']; ?></p>
                    <div class="thumb">
                        <!-- Enlace que envuelve el video -->
                        <a href="single.php?id=<?php echo $video['id']; ?>">
                            <!-- Video sin controles para una vista limpia -->
                            <video 
                                width="100%" 
                                height="auto" 
                                poster="../miniaturas/<?php echo $video['miniatura']; ?>" 
                                muted>
                            </video>
                        </a>
                    </div>
                <?php endforeach; ?>
                
                <!-- Botón de "Ver más" al final de cada categoría -->
                <div class="ver-mas">
                    <a href="categoria.php?categoria=<?php echo urlencode($categoria); ?>" class="btn-ver-mas">Ver más</a>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
</div>
<?php require '../paginacion.php'; ?>
<?php require 'views/footer.php'; ?>



