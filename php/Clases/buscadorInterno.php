<?php
    include 'Operaciones.php';
    include 'BuscadorPalabra.php';
    include '../functions.php';
    //$operacion->buscador($palabra);
    //sleep(3);
    $resProduc = array();
    $resServicios = array();
    $operacion = new Operaciones();
    $con = $operacion->conectar();
    $num = 1;
    $numServicio = 1;
    
    $operacionServ = new Operaciones();
    $conServ = $operacionServ->conectar();
    
    $palabra = mysqli_real_escape_string($con, $_POST['buscadorInterno']);
    $total = 0;
    $totalServ = 0;
    if(!empty($palabra))
    {

        //Sentencia para los productos
        $sql ="SELECT * FROM producto WHERE descripcion LIKE '%" .$palabra. "%' OR nombre LIKE '%" .$palabra. "%'";
        $resultado = mysqli_query($con,$sql);
        $total = mysqli_num_rows($resultado);
        
        while ($resProd = mysqli_fetch_assoc($resultado)) {
            
            
            $resProduc[] = array('key' =>  $num, 'ID_PRODUCTO' => $resProd["ID_PRODUCTO"],'nombre' => utf8_decode($resProd['nombre']),
                   'descripcion' => utf8_decode($resProd['descripcion']), 'ID_usuario'=> $resProd["ID_usuario"], 'precio' => utf8_decode($resProd['precio']));
             $num = $num+1;
        }
        //Sentencia para los servicios
        $sqlServ ="SELECT * FROM servicio WHERE descripcion LIKE '%" .$palabra. "%' OR nombre LIKE '%" .$palabra. "%'";
        $resultadoServ = mysqli_query($conServ,$sqlServ);
        //$filaServ = mysqli_fetch_assoc($resultadoServ);
        $totalServ = mysqli_num_rows($resultadoServ);
         while ($resServ = mysqli_fetch_assoc($resultadoServ))
         {
              $resServicios[] = array('key'=>$numServicio, 'ID_SERVICIO' => $resServ["ID_SERVICIO"],'nombre' => utf8_decode($resServ['nombre']),
                   'descripcion' => utf8_decode($resServ['descripcion']), 'ID_usuario'=> $resServ["ID_usuario"], 'precio' => utf8_decode($resServ['precio']));
               $numServicio = $numServicio +1;
         }
    }
?>

   <div id="columnas-div" class="col-sm-3 col-md-3 ocultardivProd">
      
        <?php if ($total >  0 && $palabra !=''){ ?>
     
        <?php foreach ($resProduc as $posicion=>$productoArray) { 
        if($productoArray["key"]%2==0){?>
    <div>
        <div onclick="showProduct(<?php echo $productoArray["ID_PRODUCTO"] ?>)" class="thumbnail" style="background: beige">
           <?php
            $imagen2 = select_imagen_producto(1,$productoArray["ID_PRODUCTO"]);
            ?>
           <img src="<?php echo 'https://changeitorg.000webhostapp.com//BarterNow/img/products/'.$productoArray['ID_usuario'].'/'.$imagen2 ?>"/>
            <div class="caption">
                <h1><?php echo utf8_encode($productoArray["nombre"])?></h1>
                <h5><?php echo utf8_encode($productoArray["precio"])?>&nbsp;€</h5>
                <p><?php echo utf8_encode($productoArray["ciudad"])?></p>
            </div>
        </div>
    </div>
    <?php } } ?>

        <?php }
            else if($total == 0 && $palabra !='')
            {
               if(strlen($palabra) >= 3)
               {
                   $altaBuscadorPalabra = new BuscadorPalabra('', $palabra, $_SESSION['ID_USUARIO']);
                   $operacion->buscadorPalabra($altaBuscadorPalabra);
                   //echo 'hacer insert'.$_SESSION['ID_USUARIO'];
               }
            }
        ?>
        
   </div>


    <div id="columnas-div" class="col-sm-3 col-md-3 ocultardivProd">
      
        <?php if ($total >  0 && $palabra !=''){ ?>
       
        <?php foreach ($resProduc as $posicion=>$productoArray) {
        if($productoArray["key"]%2==0){}else{ ?>
    <div>
        <div onclick="showProduct(<?php echo $productoArray["ID_PRODUCTO"] ?>)" class="thumbnail" style="background: beige">
           <?php
            $imagen2 = select_imagen_producto(1,$productoArray["ID_PRODUCTO"]);
            ?>
           <img src="<?php echo 'https://changeitorg.000webhostapp.com//BarterNow/img/products/'.$productoArray['ID_usuario'].'/'.$imagen2 ?>"/>
            <div class="caption">
                <h1><?php echo utf8_encode($productoArray["nombre"])?></h1>
                <h5><?php echo utf8_encode($productoArray["precio"])?>&nbsp;€</h5>
                <p><?php echo utf8_encode($productoArray["ciudad"])?></p>
            </div>
        </div>
    </div>
        <?php  } }?>

        <?php }
            else if($total == 0 && $palabra !='')
            {
               if(strlen($palabra) >= 3)
               {
                   $altaBuscadorPalabra = new BuscadorPalabra('', $palabra, $_SESSION['ID_USUARIO']);
                   $operacion->buscadorPalabra($altaBuscadorPalabra);
                   //echo 'hacer insert'.$_SESSION['ID_USUARIO'];
               }
            }
        ?>
   </div>


 
<div id="columnas-div" class="col-sm-3 col-md-3 ocultardivServ">
    
    <?php if ($totalServ >  0 && $palabra !=''){ ?>
        
        <?php foreach ($resServicios as $posicion=>$servicioArray) { 
        if($servicioArray["key"]%2==0){?>
    <div>
        <div onclick="showService(<?php echo $servicioArray["ID_SERVICIO"] ?>)" class="thumbnail" style="background-color: #e6f3ff">
           <?php
            $imagen4 = select_imagen_servicio(1,$servicioArray["ID_SERVICIO"]);
            ?>
           <img src="<?php echo 'https://changeitorg.000webhostapp.com//BarterNow/img/services/'.$servicioArray['ID_usuario'].'/'.$imagen4 ?>"/>
            <div class="caption">
                  <h1><?php echo utf8_encode($servicioArray["nombre"])?></h1>
                <h5><?php echo utf8_encode($servicioArray["precio"])?>&nbsp;€/h</h5>
                <p><?php echo utf8_encode($servicioArray["ciudad"])?></p>
            </div>
        </div>
    </div>
    <?php } } ?>
            
        <?php }    
        ?>
</div>

<div id="columnas-div" class="col-sm-3 col-md-3 ocultardivServ">
    
    <?php if ($totalServ >  0 && $palabra !=''){ ?>
       
        
         <?php foreach ($resServicios as $posicion=>$servicioArray) {
         if($servicioArray["key"]%2==0){}else{?>
    <div>
        <div onclick="showService(<?php echo $servicioArray["ID_SERVICIO"] ?>)" class="thumbnail" style="background-color: #e6f3ff">
           <?php
            $imagen4 = select_imagen_servicio(1,$servicioArray["ID_SERVICIO"]);
            ?>
           <img src="<?php echo 'https://changeitorg.000webhostapp.com//BarterNow/img/services/'.$servicioArray['ID_usuario'].'/'.$imagen4 ?>"/>
            <div class="caption">
                  <h1><?php echo utf8_encode($servicioArray["nombre"])?></h1>
                <h5><?php echo utf8_encode($servicioArray["precio"])?>&nbsp;€/h</h5>
                <p><?php echo utf8_encode($servicioArray["ciudad"])?></p>
            </div>
        </div>
    </div>
        <?php  } }?>

        <?php } 
            else if($totalServ == 0 && $palabra !='')
            {
               if(strlen($palabra) >= 3)
               {
                   $altaBuscadorPalabra = new BuscadorPalabra('', $palabra, $_SESSION['ID_USUARIO']);
                   $operacion->buscadorPalabra($altaBuscadorPalabra);
                   //echo 'hacer insert'.$_SESSION['ID_USUARIO'];
               }
            }
        ?>
</div>

