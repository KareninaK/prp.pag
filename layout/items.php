<div class="articulo">
    <input type="hidden" id="id" value="<?php echo $item['id'];  ?>">
    <div class="imagen"><img src="img/<?php echo $item['imagen'];  ?>" /></div>
    <div class="imagen"><img src="img/<?php echo $item['foto1'];  ?>" /></div>
    <div class="imagen"><img src="img/<?php echo $item['foto2'];  ?>" /></div>
    <div class="titulo"><?php echo $item['nombre'];  ?></div>
    <div class="precio">$<?php echo $item['precio'];  ?> Arg</div>
     <div class="estado">Estado: <?php echo $item['estado'];  ?> </div>
   <!-- <div class="botones">
        <button>Agregar al carrito</button>
    </div>-->
</div>