<?php
    
    include 'Operaciones.php';
    include 'Favorito.php';
   
    $operacion = new Operaciones();
    $con = $operacion->conectar();
   
    $ID_usuario = $_SESSION['ID_USUARIO'];
    $ID_producto = $_POST['inputProducto'];

    $favorito = new Favorito($ID_producto,$ID_usuario);
    $operacion->altaFavoritoProducto($favorito);
 ?>