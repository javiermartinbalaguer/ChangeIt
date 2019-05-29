<?php
require_once 'Clases/Operaciones.php';
function connect(){
    $operacion = new Operaciones();
    $con = $operacion->conectar();
    return $con;
}

function close($conn){
    $conn->close();
}

function eliminarDir($carpeta)
{
    foreach(glob($carpeta . "/*") as $archivos_carpeta)
    {
        echo $archivos_carpeta;

        if (is_dir($archivos_carpeta))
        {
            eliminarDir($archivos_carpeta);
        }
        else
        {
            unlink($archivos_carpeta);
        }
    }

    rmdir($carpeta);
}

function select_all_tema_producto(){
    $conn = connect();
    $sql = "SELECT * 
    FROM categoriasproducto
    ORDER BY tema asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_tema_servicio()
{
    $conn = connect();
    $sql = "SELECT * 
    FROM categoriasservicio
    ORDER BY tema asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_nombre_tema_producto($idTema){
    $conn = connect();
    $sql = "select * from categoriasproducto WHERE ID_CAT_PROD = '".$idTema."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $tema = $row['tema'];
    close($conn);
    return $tema;
}

function select_nombre_tema_servicio($idTema){
    $conn = connect();
    $sql = "select * from categoriasservicio WHERE ID_CAT_SERV = '".$idTema."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $tema = $row['tema'];
    close($conn);
    return $tema;
}

function select_idUsuario_servicio($idServicio){
    $conn = connect();
    $sql = "select * from servicio WHERE ID_SERVICIO = '".$idServicio."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $id_usuario = $row['ID_usuario'];
    close($conn);
    return $id_usuario;
}

function select_idUsuario_producto($idProducto){
    $conn = connect();
    $sql = "select * from producto WHERE ID_PRODUCTO = '".$idProducto."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $id_usuario = $row['ID_usuario'];
    close($conn);
    return $id_usuario;
}

function select_id_producto(){
    $conn = connect();
    $sql = "select * from producto ORDER BY ID_PRODUCTO DESC LIMIT 1";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $id_producto = $row['ID_PRODUCTO'];
    close($conn);
    return $id_producto;
}

function select_id_servicio(){
    $conn = connect();
    $sql = "select * from servicio ORDER BY ID_SERVICIO DESC LIMIT 1";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $id_servicio = $row['ID_SERVICIO'];
    close($conn);
    return $id_servicio;
}

function select_producto($id_Producto){
    $conn = connect();
    $sql = "SELECT *
    FROM producto WHERE ID_PRODUCTO = '".$id_Producto."'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_servicio($id_Servicio){
    $conn = connect();
    $sql = "SELECT *
    FROM servicio WHERE ID_SERVICIO = '".$id_Servicio."'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_products_par($orden,$cantidad){
    $conn = connect();
    switch($orden){
        case 'fechaAsc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) = 0 AND pendiente_valoracion = 0 ORDER BY fecha asc LIMIT 0, $cantidad";
        break;
        case 'fechaDesc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) = 0 AND pendiente_valoracion = 0 ORDER BY fecha desc LIMIT 0, $cantidad";
            break;
        case 'nombreAsc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) = 0 AND pendiente_valoracion = 0 ORDER BY nombre asc LIMIT 0, $cantidad";
            break;
        case 'nombreDesc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) = 0 AND pendiente_valoracion = 0 ORDER BY nombre desc LIMIT 0, $cantidad";
            break;
        case 'precioAsc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) = 0 AND pendiente_valoracion = 0 ORDER BY precio asc LIMIT 0, $cantidad";
            break;
        case 'precioDesc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) = 0 AND pendiente_valoracion = 0 ORDER BY precio desc LIMIT 0, $cantidad";
            break;
    }
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_categoria_products_par($tema,$orden,$cantidad){
    $conn = connect();
    switch($orden){
        case 'temaAsc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) = 0 AND tema = '".$tema."' ORDER BY fecha asc LIMIT 0, $cantidad";
            break;
        case 'temaDesc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) = 0 AND tema = '".$tema."' ORDER BY fecha desc LIMIT 0, $cantidad";
            break;
    }
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_ciudad_products_par($ciudad,$cantidad){
    $conn = connect();
    $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) = 0 AND ciudad = '".$ciudad."' ORDER BY fecha desc LIMIT 0, $cantidad";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_ciudad_products_impar($ciudad,$cantidad){
    $conn = connect();
    $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) <> 0 AND ciudad = '".$ciudad."' ORDER BY fecha desc LIMIT 0, $cantidad";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_ciudad_services_par($ciudad,$cantidad){
    $conn = connect();
    $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) = 0 AND ciudad = '".$ciudad."' ORDER BY fecha desc LIMIT 0, $cantidad";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_ciudad_services_impar($ciudad,$cantidad){
    $conn = connect();
    $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) <> 0 AND ciudad = '".$ciudad."' ORDER BY fecha desc LIMIT 0, $cantidad";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_categoria_products_impar($tema,$orden,$cantidad){
    $conn = connect();
    switch($orden){
        case 'temaAsc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) <> 0 AND tema = '".$tema."' ORDER BY fecha asc LIMIT 0, $cantidad";
            break;
        case 'temaDesc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) <> 0 AND tema = '".$tema."' ORDER BY fecha desc LIMIT 0, $cantidad";
            break;
    }
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_categoria_services_par($tema,$orden,$cantidad){
    $conn = connect();
    switch($orden){
        case 'temaAsc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) = 0 AND tema = '".$tema."' ORDER BY fecha asc LIMIT 0, $cantidad";
            break;
        case 'temaDesc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) = 0 AND tema = '".$tema."' ORDER BY fecha desc LIMIT 0, $cantidad";
            break;
    }
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_categoria_services_impar($tema,$orden,$cantidad){
    $conn = connect();
    switch($orden){
        case 'temaAsc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) <> 0 AND tema = '".$tema."' ORDER BY fecha asc LIMIT 0, $cantidad";
            break;
        case 'temaDesc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) <> 0 AND tema = '".$tema."' ORDER BY fecha desc LIMIT 0, $cantidad";
            break;
    }
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_price_products_par($menor,$mayor,$orden,$cantidad){
    $conn = connect();
    switch($orden){
        case 'precioAsc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) = 0 AND precio >= '".$menor."' AND precio <= '".$mayor."' ORDER BY precio asc LIMIT 0, $cantidad";
            break;
        case 'precioDesc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) = 0 AND precio >= '".$menor."' AND precio <= '".$mayor."' ORDER BY precio desc LIMIT 0, $cantidad";
            break;
    }
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_price_products_impar($menor,$mayor,$orden,$cantidad){
    $conn = connect();
    switch($orden){
        case 'precioAsc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) <> 0 AND precio >= '".$menor."' AND precio <= '".$mayor."' ORDER BY precio asc LIMIT 0, $cantidad";
            break;
        case 'precioDesc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) <> 0 AND precio >= '".$menor."' AND precio <= '".$mayor."' ORDER BY precio desc LIMIT 0, $cantidad";
            break;
    }
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_price_services_par($menor,$mayor,$orden,$cantidad){
    $conn = connect();
    switch($orden){
        case 'precioAsc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) = 0 AND precio >= '".$menor."' AND precio <= '".$mayor."' ORDER BY precio asc LIMIT 0, $cantidad";
            break;
        case 'precioDesc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) = 0 AND precio >= '".$menor."' AND precio <= '".$mayor."' ORDER BY precio desc LIMIT 0, $cantidad";
            break;
    }
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_price_services_impar($menor,$mayor,$orden,$cantidad){
    $conn = connect();
    switch($orden){
        case 'precioAsc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) <> 0 AND precio >= '".$menor."' AND precio <= '".$mayor."' ORDER BY precio asc LIMIT 0, $cantidad";
            break;
        case 'precioDesc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) <> 0 AND precio >= '".$menor."' AND precio <= '".$mayor."' ORDER BY precio desc LIMIT 0, $cantidad";
            break;
    }
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_products_impar($orden,$cantidad){
    $conn = connect();
    switch($orden){
        case 'fechaAsc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) <> 0 AND pendiente_valoracion = 0 ORDER BY fecha asc LIMIT 0, $cantidad";
            break;
        case 'fechaDesc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) <> 0 AND pendiente_valoracion = 0 ORDER BY fecha desc LIMIT 0, $cantidad";
            break;
        case 'nombreAsc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) <> 0 AND pendiente_valoracion = 0 ORDER BY nombre asc LIMIT 0, $cantidad";
            break;
        case 'nombreDesc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) <> 0 AND pendiente_valoracion = 0 ORDER BY nombre desc LIMIT 0, $cantidad";
            break;
        case 'precioAsc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) <> 0 AND pendiente_valoracion = 0 ORDER BY precio asc LIMIT 0, $cantidad";
            break;
        case 'precioDesc':
            $sql = "SELECT * FROM producto WHERE mod(ID_PRODUCTO,2) <> 0 AND pendiente_valoracion = 0 ORDER BY precio desc LIMIT 0, $cantidad";
            break;
    }
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_services_par($orden,$cantidad){
    $conn = connect();
    switch($orden){
        case 'fechaAsc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) = 0 AND borrado = 0 ORDER BY fecha asc LIMIT 0, $cantidad";
            break;
        case 'fechaDesc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) = 0 AND borrado = 0 ORDER BY fecha desc LIMIT 0, $cantidad";
            break;
        case 'nombreAsc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) = 0 AND borrado = 0 ORDER BY nombre asc LIMIT 0, $cantidad";
            break;
        case 'nombreDesc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) = 0 AND borrado = 0 ORDER BY nombre desc LIMIT 0, $cantidad";
            break;
        case 'precioAsc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) = 0 AND borrado = 0 ORDER BY precio asc LIMIT 0, $cantidad";
            break;
        case 'precioDesc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) = 0 AND borrado = 0 ORDER BY precio desc LIMIT 0, $cantidad";
            break;
    }
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_services_impar($orden,$cantidad){
    $conn = connect();
    switch($orden){
        case 'fechaAsc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) <> 0 AND borrado = 0 ORDER BY fecha asc LIMIT 0, $cantidad";
            break;
        case 'fechaDesc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) <> 0 AND borrado = 0 ORDER BY fecha desc LIMIT 0, $cantidad";
            break;
        case 'nombreAsc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) <> 0 AND borrado = 0 ORDER BY nombre asc LIMIT 0, $cantidad";
            break;
        case 'nombreDesc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) <> 0 AND borrado = 0 ORDER BY nombre desc LIMIT 0, $cantidad";
            break;
        case 'precioAsc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) <> 0 AND borrado = 0 ORDER BY precio asc LIMIT 0, $cantidad";
            break;
        case 'precioDesc':
            $sql = "SELECT * FROM servicio WHERE mod(ID_SERVICIO,2) <> 0 AND borrado = 0 ORDER BY precio desc LIMIT 0, $cantidad";
            break;
    }
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_producto_par($id_usuario){
    $conn = connect();
    $sql = "SELECT *
    FROM producto WHERE ID_usuario = '".$id_usuario."' AND mod(ID_PRODUCTO,2) = 0 AND pendiente_valoracion = 0";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_producto_impar($id_usuario){
    $conn = connect();
    $sql = "SELECT *
    FROM producto WHERE ID_usuario = '".$id_usuario."' AND mod(ID_PRODUCTO,2) <> 0 AND pendiente_valoracion = 0";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_servicio_par($id_usuario){
    $conn = connect();
    $sql = "SELECT *
    FROM servicio WHERE ID_usuario = '".$id_usuario."' AND mod(ID_SERVICIO,2) = 0 AND borrado = 0";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_servicio_impar($id_usuario){
    $conn = connect();
    $sql = "SELECT *
    FROM servicio WHERE ID_usuario = '".$id_usuario."' AND mod(ID_SERVICIO,2) <> 0 AND borrado = 0";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_imagen_servicio($id_imagen,$id_servicio){
    $conn = connect();
    $sql = "SELECT *
    FROM imagenservicio WHERE ID_servicio = '".$id_servicio."' AND ID_imagen = '".$id_imagen."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $url_servicio = $row['url_servicio'];
    close($conn);
    return $url_servicio;
}

function select_imagen_producto($id_imagen,$id_producto){
    $conn = connect();
    $sql = "SELECT *
    FROM imagenproducto WHERE ID_producto = '".$id_producto."' AND ID_imagen = '".$id_imagen."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $url_producto = $row['url_producto'];
    close($conn);
    return $url_producto;
}

function select_usuario_servicio($id_servicio){
    $conn = connect();
    $sql = "SELECT *
    FROM servicio WHERE ID_servicio = '".$id_servicio."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $ID_usuario = $row['ID_usuario'];
    close($conn);
    return $ID_usuario;
}

function select_usuario_producto($id_producto){
    $conn = connect();
    $sql = "SELECT *
    FROM producto WHERE ID_producto = '".$id_producto."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $ID_usuario = $row['ID_usuario'];
    close($conn);
    return $ID_usuario;
}

function select_nombre_servicio($id_servicio){
    $conn = connect();
    $sql = "select * from servicio WHERE ID_SERVICIO = '".$id_servicio."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre_servicio = $row['nombre'];
    close($conn);
    return $nombre_servicio;
}

function select_precio_servicio($id_servicio){
    $conn = connect();
    $sql = "select * from servicio WHERE ID_SERVICIO = '".$id_servicio."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $precio_servicio = $row['precio'];
    close($conn);
    return $precio_servicio;
}

function select_nombre_producto($id_producto){
    $conn = connect();
    $sql = "select * from producto WHERE ID_PRODUCTO = '".$id_producto."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre_producto = $row['nombre'];
    close($conn);
    return $nombre_producto;
}

function select_precio_producto($id_producto){
    $conn = connect();
    $sql = "select * from producto WHERE ID_PRODUCTO = '".$id_producto."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $precio_producto = $row['precio'];
    close($conn);
    return $precio_producto;
}

function select_nombre_usuario($id_usuario){
    $conn = connect();
    $sql = "select * from usuario WHERE ID_USUARIO = '".$id_usuario."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $nombre_usuario = $row['nombre'];
    close($conn);
    return $nombre_usuario;
}

function select_imagen_usuario($id_usuario){
    $conn = connect();
    $sql = "select * from usuario WHERE ID_USUARIO = '".$id_usuario."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $imagen_usuario = $row['imagen'];
    close($conn);
    return $imagen_usuario;
}

function select_ciudad_usuario($id_usuario){
    $conn = connect();
    $sql = "select * from usuario WHERE ID_USUARIO = '".$id_usuario."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $ciudad = $row['ciudad'];
    close($conn);
    return $ciudad;
}

function select_all_servicio($id_servicio){
    $conn = connect();
    $sql = "SELECT *
    FROM servicio WHERE ID_servicio = '".$id_servicio."'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_deseo_usuario($id_usuario){
    $conn = connect();
    $sql = "SELECT *
    FROM wishlist WHERE ID_usuario = '".$id_usuario."'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_buscar_palabra_usuario($id_usuario){
    $conn = connect();
    $sql = "SELECT *
    FROM buscadorpalabra WHERE ID_usuario = '".$id_usuario."'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_usuarios(){
    $conn = connect();
    $sql = "SELECT * FROM usuario 
            WHERE ID_USUARIO != 0 ORDER BY nombre asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_productos(){
    $conn = connect();
    $sql = "SELECT * FROM producto 
            WHERE ID_usuario != 0 ORDER BY fecha asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_all_servicios(){
    $conn = connect();
    $sql = "SELECT * FROM servicio 
            WHERE ID_usuario != 0 ORDER BY fecha asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_compras_usuario($idUsuario){
    $conn = connect();
    $sql = "select * from usuario WHERE ID_USUARIO = '".$idUsuario."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $compras = $row['compras'];
    close($conn);
    return $compras;
}


function select_ventas_usuario($idUsuario){
    $conn = connect();
    $sql = "select * from usuario WHERE ID_USUARIO = '".$idUsuario."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
    $ventas = $row['ventas'];
    close($conn);
    return $ventas;
}

function select_nuevos_usuarios($inicio,$final){
    $conn = connect();
    $sql = "SELECT * FROM usuario 
            WHERE fecha >= '".$inicio."' AND fecha <= '".$final."' ORDER BY fecha asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_nuevos_productos($inicio,$final){
    $conn = connect();
    $sql = "SELECT * FROM producto 
            WHERE fecha >= '".$inicio."' AND fecha <= '".$final."' ORDER BY fecha asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}

function select_nuevos_servicios($inicio,$final){
    $conn = connect();
    $sql = "SELECT * FROM servicio 
            WHERE fecha >= '".$inicio."' AND fecha <= '".$final."' ORDER BY fecha asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
}
?>