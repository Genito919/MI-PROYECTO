
<?php require 'header.php'; ?>

<!-- Sección 4 Contenido -->
<div class="contenedor4">
    <?php foreach($posts as $post): ?>

        <div class="post">
            <article>

                <div class="thumb">
                    <!-- Enlace que envuelve el video -->
                    <a href="single.php?id=<?php echo $post['id']; ?>">
                        <!-- Video sin controles para una vista limpia -->
                        <video width="100%" height="auto" poster="http://192.168.10.10/curso_php/PROYECTO%20TRAVELBLOGS/miniaturas/<?php echo $post['miniatura']; ?>"></video>
                    </a>
                </div>

                <!-- TÍTULO ENLACE -->
                <h2 class="titulo">
                    <a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo']; ?></a>
                </h2>

                <p class="fecha"><?php echo ($post['usuario']); ?></p>
                <p class="extracto"><?php echo $post['descripcion'] ?></p>
                
            </article>
        </div>

    <?php endforeach; ?>
</div>

<?php require 'paginacion.php'; ?>

<?php require 'footer.php'; ?>

