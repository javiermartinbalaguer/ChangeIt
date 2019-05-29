<?php
    
    include 'Operaciones.php';
    include 'Favorito.php';
   
    $operacion = new Operaciones();
    $con = $operacion->conectar();
   
    $ID_usuario = $_SESSION['ID_USUARIO'];
    $ID_servicio = $_POST['inputFavorito'];

    $favorito = new Favorito($ID_servicio,$ID_usuario);
    $operacion->altaFavoritoServicio($favorito);
 ?>