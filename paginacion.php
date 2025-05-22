<?php $numero_paginas = numero_paginas($blog_config['post_por_pagina'], $conexion); ?>
<section class="mb-8">
  <ul class="list-none text-center">
    <?php if(pagina_actual() === 1): ?>
      <li class="inline-block mx-1 bg-gray-400 cursor-not-allowed text-white px-5 py-2.5 rounded">&laquo;</li>
    <?php else: ?>
      <li class="inline-block mx-1">
        <a href="index.php?p=<?php echo pagina_actual() - 1 ?>"
           class="block bg-[#141416] text-white px-5 py-2.5 rounded hover:bg-[#2563EB] transition-colors duration-300">
          &laquo;
        </a>
      </li>
    <?php endif; ?>

    <?php for($i = 1; $i <= $numero_paginas; $i++): ?>
      <?php if(pagina_actual() === $i): ?>
        <li class="inline-block mx-1 bg-[#FF1473] text-white px-5 py-2.5 rounded"><?php echo $i; ?></li>
      <?php else: ?>
        <li class="inline-block mx-1">
          <a href="index.php?p=<?php echo $i; ?>"
             class="block bg-[#141416] text-white px-5 py-2.5 rounded hover:bg-[#2563EB] transition-colors duration-300">
            <?php echo $i ?>
          </a>
        </li>
      <?php endif; ?>
    <?php endfor; ?>

    <?php if(pagina_actual() == $numero_paginas): ?>
      <li class="inline-block mx-1 bg-gray-400 cursor-not-allowed text-white px-5 py-2.5 rounded">&raquo;</li>
    <?php else: ?>
      <li class="inline-block mx-1">
        <a href="index.php?p=<?php echo pagina_actual() + 1 ?>"
           class="block bg-[#141416] text-white px-5 py-2.5 rounded hover:bg-[#2563EB] transition-colors duration-300">
          &raquo;
        </a>
      </li>
    <?php endif; ?>
  </ul>
</section>
