<?php require 'header.php'; ?>


<!-- Contenedor Principal -->
<div class="contenedor5">
    <!-- Contenido Principal -->
    <div class="contenido-principal">
        <div class="post"> 
            <article>
                
                <div class="thumb">
                    <video width="100%" height="auto" controls poster="http://192.168.10.10/curso_php/practica/MI_PROYECTO/miniaturas/<?php echo $post['miniatura']; ?>">
                        <source src="http://192.168.10.10/curso_php/practica/MI_PROYECTO/videos/<?php echo $post['video']; ?>" type="video/mp4">
                        Tu navegador no soporta la etiqueta de video.
                    </video>
                </div>
                <h2><?php echo $post['titulo']; ?></h2>
                <p class="fecha"><?php echo $post['usuario']; ?></p>
                <p class="extracto"><?php echo nl2br($post['descripcion']);?></p>
            </article>
        </div>
    </div>

  <!-- Barra Lateral con Otros Videos -->
  <div class="barra-lateral">
  <div class="post"> 
            <article>
                <h2><?php echo $post['titulo']; ?></h2>
                <p class="fecha"><?php echo $post['usuario']; ?></p>
                <div class="thumb">
                    <video width="100%" height="auto" controls poster="http://192.168.10.10/curso_php/practica/MI_PROYECTO/miniaturas/<?php echo $post['miniatura']; ?>">
                        <source src="http://192.168.10.10/curso_php/practica/MI_PROYECTO/videos/<?php echo $post['video']; ?>" type="video/mp4">
                        Tu navegador no soporta la etiqueta de video.
                    </video>
                </div>
                <p class="extracto"><?php echo nl2br($post['descripcion']);?></p>
            </article>
        </div>
    </div>
</div>




<?php require 'footer.php'; ?>
</body>
</html>

