<div class="articulo">
    <input type="hidden" id="id" value="<?php echo $item['id'];  ?>">
    <div class="imagen"><img src="img/<?php echo $item['foto1'];  ?>" /></div>
    <div class="imagen"><img src="img/<?php echo $item['foto2'];  ?>" /></div>
    <div class="imagen"><img src="img/<?php echo $item['foto3'];  ?>" /></div>
    <div class="imagen"><img src="img/<?php echo $item['foto4'];  ?>" /></div>
    <div class="imagen"><img src="img/<?php echo $item['foto5'];  ?>" /></div>
    <div class="imagen"><img src="img/<?php echo $item['foto6'];  ?>" /></div>
    <div class="titulo"><?php echo $item['nombre'];  ?></div>
    <div class="precio">$<?php echo $item['precio'];  ?> Arg</div>

   <!-- <div class="botones">
        <button>Agregar al carrito</button>
    </div> -->
</div>