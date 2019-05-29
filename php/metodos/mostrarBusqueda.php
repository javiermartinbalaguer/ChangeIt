<?php
session_start();

/*
  <?php foreach ($item->url as $valor){ ?>
            <img class="img-rounded" src="../img/products/<?php echo $valor->id_Imagen?>/<?php echo $valor->url_producto?>" />
            <?php } ?>
 */
if (isset($_SESSION['objetoProd'])){
   // echo $_SESSION['objetoProd'];
    
    $objProducto = json_decode($_SESSION['objetoProd']);

} 

if (isset($_SESSION['objetoServ'])){ 
    $objServicio = json_decode($_SESSION['objetoServ']);
} 

?>

<div id="columnas-div" class="col-sm-3 col-md-3">
    <?php if (isset($objProducto)){ ?>
        <?php  foreach ($objProducto as $item) { 
            if($item->key%2==0){?>
        <div>
            <div onclick="showProduct(<?php echo $item->ID_PRODUCTO ?>)" class="thumbnail" style="background:beige">

                <div class="caption">
                    <h1><?php echo utf8_encode($item->nombre)?></h1>
                    <h5><?php echo utf8_encode($item->precio)?>&nbsp;€</h5>
                    <p><?php echo utf8_encode($item->descripcion)?></p>
                </div>
            </div>
        </div>
        <?php } } ?>
    
    <?php } ?>
</div>

<div id="columnas-div" class="col-sm-3 col-md-3">
    <?php if (isset($objProducto)){ ?>
        <?php foreach ($objProducto as $item) {
            if($item->key%2==0){}else{ ?>
        <div>
            <div onclick="showProduct(<?php echo $item->ID_PRODUCTO ?>)" class="thumbnail" style="background:beige">

                <div class="caption">
                    <h1><?php echo utf8_encode($item->nombre)?></h1>
                    <h5><?php echo utf8_encode($item->precio)?>&nbsp;€</h5>
                    <p><?php echo utf8_encode($item->descripcion)?></p>
                </div>
            </div>
        </div>
        <?php  } }?>
    <?php } ?>
</div> 


<div id="columnas-div" class="col-sm-3 col-md-3">
    <?php if (isset($objServicio )){ ?>
        <?php foreach ($objServicio as $item) { 
            if($item->key%2==0){?>
        <div>
            <div onclick="showService(<?php echo $item->ID_SERVICIO ?>)" class="thumbnail" style="background-color: #e6f3ff">

                <div class="caption">
                    <h1><?php echo utf8_encode($item->nombre)?></h1>
                    <h5><?php echo utf8_encode($item->precio)?>&nbsp;€</h5>
                    <p><?php echo utf8_encode($item->descripcion)?></p>
                </div>
            </div>
        </div>
        <?php } } ?>
    <?php } ?>
</div>

<div id="columnas-div" class="col-sm-3 col-md-3">
    <?php if (isset($objServicio)){ ?>
        <?php foreach ($objServicio as $item) {
            if($item->key%2==0){}else{ ?>
        <div>
            <div onclick="showService(<?php echo $item->ID_SERVICIO ?>)" class="thumbnail" style="background-color: #e6f3ff">

                <div class="caption">
                    <h1><?php echo utf8_encode($item->nombre)?></h1>
                    <h5><?php echo utf8_encode($item->precio)?>&nbsp;€</h5>
                    <p><?php echo utf8_encode($item->descripcion)?></p>
                </div>
            </div>
        </div>
        <?php  } }?>
    <?php } ?>
</div> 