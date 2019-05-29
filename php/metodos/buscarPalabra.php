<?php
    include '../Clases/Operaciones.php';
    $operacion = new Operaciones();
    $con = $operacion->conectar();

    $sql ="SELECT * FROM buscadorpalabra WHERE ID_usuario='" . $_SESSION['ID_USUARIO'] . "' ";
    $resultado = mysqli_query($con,$sql);
    $resProductos = array();
    $arrayImagenProd;
    
    $resServicios = array();
    $arrayImagenServ;
    $num = 1;
    $numServicio = 1;
    

    if ($resultado->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
          $sql ="SELECT * FROM producto WHERE (descripcion LIKE '%" .$row['buscar_palabra']. "%' OR nombre LIKE '%" .$row['buscar_palabra']. "%') AND ID_usuario !='" . $_SESSION['ID_USUARIO'] . "' ";
          $resultadoProd = mysqli_query($con,$sql);
          
          $sqlServ ="SELECT * FROM servicio WHERE (descripcion LIKE '%" .$row['buscar_palabra']. "%' OR nombre LIKE '%" .$row['buscar_palabra']. "%') AND ID_usuario !='" . $_SESSION['ID_USUARIO'] . "' ";
          $resultadoServ = mysqli_query($con,$sqlServ);
          //Esta parte es sólo para los almacenar los productos
          
          
           if($resultadoProd->num_rows > 0)
           {
               while ($resProd = mysqli_fetch_assoc($resultadoProd))
               {
                   //Muestro al usuario los nombres de los productos que se han encontado 
                   //Se activa el modal que se encuentra en la parte inferior del fichero selectArticlesConLogin.php
                   echo '<Button type="button" class="btn btn-primary">'.strtoupper($resProd['nombre'])."</Button>";
                   
                   //Sentencia que obtiene las imagenes de los productos
                   $sql ="SELECT * FROM imagenproducto WHERE ID_producto='" . $resProd["ID_PRODUCTO"] . "' ";
                   $resultImagenProd = mysqli_query($con,$sql);
                   //Este búcle almacena un array de imagenes para posteriormente crear un json y trabajar con este.
                   while($urlImagenProd = mysqli_fetch_assoc($resultImagenProd)){
                       $arrayImagenProd[] = array('imagenProd' => $urlImagenProd['url_producto'],'id_Imagen'=>$urlImagenProd['ID_imagen'] );
                   }
                   //Verifíco si el $arrayImagenProd esta vacío.
                   if(empty($arrayImagenProd))
                   {
                       $arrayImagenProd = array();
                   }
                   
                   $resProductos[] = array('key' =>  $num, 'ID_PRODUCTO' => $resProd["ID_PRODUCTO"],'nombre' => $resProd['nombre'],
                   'descripcion' => $resProd['descripcion'],'ID_usuario'=> $resProd["ID_usuario"], 'precio' => $resProd['precio'],'url' => $arrayImagenProd );
                   
                   //Json lo almaceno en una session para utilizarlo más adelante si el usuario decide ver los articulos, caso contrario no se muestra nada.
                   $_SESSION['objetoProd'] = json_encode($resProductos);
                   unset($arrayImagenProd);
                   $num = $num+1;
                 
               }
               
               $sqlEliminar ="DELETE  FROM buscadorpalabra WHERE ID_usuario='" . $_SESSION['ID_USUARIO'] . "' AND buscar_palabra='".$row['buscar_palabra']."' ";
               $resultadoPal = mysqli_query($con,$sqlEliminar);
           }
           
           if($resultadoServ->num_rows > 0)
           {
               while ($resServ = mysqli_fetch_assoc($resultadoServ))
               {
                   echo '<Button type="button" class="btn btn-primary">'.strtoupper($resServ['nombre'])."</Button>";
                   
                   $sql ="SELECT * FROM imagenservicio WHERE ID_servicio='" . $resServ["ID_SERVICIO"] . "' ";
                   $resultImagenServ = mysqli_query($con,$sql);
                   
                   while($urlImagenServ = mysqli_fetch_assoc($resultImagenServ)){
                       $arrayImagenServ[] = array('imagenServ' => $urlImagenServ['url_servicio']);
                   }
                   //Verifíco si el $arrayImagenProd esta vacío.
                   if(empty($arrayImagenServ))
                   {
                       $arrayImagenServ = array();
                   }
                   
                  $resServicios[] = array('key'=>$numServicio, 'ID_SERVICIO' => $resServ["ID_SERVICIO"],'nombre' => $resServ['nombre'],
                   'descripcion' => $resServ['descripcion'],'precio' => $resServ['precio'],'url' => $arrayImagenServ );
                   
                   //Json lo almaceno en una session para utilizarlo más adelante si el usuario decide ver los articulos, caso contrario no se muestra nada.
                   $_SESSION['objetoServ'] = json_encode($resServicios);
                   unset($arrayImagenServ);
                   $numServicio = $numServicio +1;
               }
               $sqlEliminar ="DELETE  FROM buscadorpalabra WHERE ID_usuario='" . $_SESSION['ID_USUARIO'] . "' AND buscar_palabra='".$row['buscar_palabra']."' ";
               $resultadoPal = mysqli_query($con,$sqlEliminar);
           }
        }
    }

    
?>