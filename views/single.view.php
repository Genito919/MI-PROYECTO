<?php require 'header.php'; ?>

<!-- Contenedor Principal -->
<div class="contenedor5">
    <!-- Contenido Principal -->
    <div class="contenido-principal">
        <div class="post"> 
            <article>
                <div class="thumb">
                    <video width="100%" height="auto" controls poster="http://192.168.10.10/curso_php/practica/MI_PROYECTO/miniaturas/<?php echo $post['miniatura']; ?>">
                        <source src="http://192.168.10.10/curso_php/PROYECTO TRAVELBLOGS/videos/<?php echo $post['video']; ?>" type="video/mp4">
                        Tu navegador no soporta la etiqueta de video.
                    </video>
                </div>
                <h2><?php echo $post['titulo']; ?></h2>
                <p class="fecha">Publicado por: <?php echo $post['usuario']; ?></p>
                <p class="extracto"><?php echo nl2br($post['descripcion']);?></p>
                
<!-- Botones de interacción -->
<div class="video-actions">
    <button class="like-btn"><i class="fa-solid fa-thumbs-up"></i> Me gusta</button>
    <button class="dislike-btn"><i class="fa-solid fa-thumbs-down"></i> No me gusta</button>
    <button class="subscribe-btn"><i class="fa-solid fa-bell"></i> Suscribirse</button>
    <button class="share-btn"><i class="fa-solid fa-share"></i> Compartir</button>
</div>

            </article>
        </div>
    </div>

    <!-- Barra Lateral con Otros Videos -->
    <div class="barra-lateral">
        <div class="post"> 
            <article>
                <h2><?php echo $post['titulo']; ?></h2>
                <p class="fecha">Publicado por: <?php echo $post['usuario']; ?></p>
                <div class="thumb">
                    <video width="100%" height="auto" controls poster="http://192.168.10.10/curso_php/PROYECTO TRAVELBLOGS/miniaturas/<?php echo $post['miniatura']; ?>">
                        <source src="http://192.168.10.10/curso_php/PROYECTO TRAVELBLOGS/videos/<?php echo $post['video']; ?>" type="video/mp4">
                        Tu navegador no soporta la etiqueta de video.
                    </video>
    
                <p class="extracto"><?php echo nl2br($post['descripcion']);?></p>
            </article>
        </div>
    </div>
</div>



<?php require 'footer.php'; ?>
</body>
</html>

