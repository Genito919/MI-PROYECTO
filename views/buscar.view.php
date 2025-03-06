
<?php require 'header.php'; ?>
<?php require 'sidebar.php'; ?>

<!-- Sección 4 Contenido -->
<div class="contenedor4">
    <?php foreach($resultados as $post): ?>

        <div class="post">
            <article>
            <h2 class="titulo" onclick="location.href='single.php?id=<?php echo $post['id']; ?>'" style="cursor: pointer;">
    <?php echo $post['titulo']; ?>
</h2>
                <p class="fecha"><?php echo $post['usuario']; ?></p>

                <div class="thumb">
                    <a href="single.php?id=<?php echo $post['id']; ?>">
                        <img src="./imagenes/<?php echo $post['categoria']; ?>" alt="<?php echo $post['titulo'] ?>">
                    </a>
                </div>
                <p class="extracto"><?php echo $post['descripcion'] ?></p>
                <a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Continuar Leyendo</a>
            </article>
        </div>


        <?php endforeach; ?>
    


</div>

<?php require 'paginacion.php'; ?>

<?php require 'footer.php'; ?>