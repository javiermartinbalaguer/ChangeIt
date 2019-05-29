<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
error_reporting(E_ERROR | E_PARSE);
require_once 'Clases/Usuario.php';
require_once 'Clases/Deseo.php';
require_once 'Clases/Palabra.php';
require_once 'Clases/Producto.php';
require_once 'Clases/Servicio.php';
require_once 'Clases/ImagenServicio.php';
require_once 'Clases/ImagenProducto.php';
require_once 'Clases/Operaciones.php';
require_once 'Clases/ValoracionProducto.php';
require_once 'Clases/ValoracionServicio.php';
include('functions.php');

// Dependiendo del formulario se realiza un registro o login y posteriormente se pondr�a a�adir un producto
$tipoForm = isset($_GET['tipo']) ? $_GET['tipo']: 'default';

switch ($tipoForm)
{
    case 'login':

        $operacion = new Operaciones();
        $con = $operacion->conectar();
        //recibo los parametros que se envian desde elformulario
        $correo = mysqli_real_escape_string($con, $_POST['correo']);
        $contrasenya = mysqli_real_escape_string($con, md5($_POST['contrasenya']));
        $loginUsuario = new Usuario('', '', $contrasenya, $correo,"","","","","");

        $operacion->loginUsuario($loginUsuario);
        //retorna a una pagina con el login hecho

        break;

    case 'confirmar':

        $operacion = new Operaciones();
        $con = $operacion->conectar();
        //recibo los parametros que se envian desde elformulario
        $correo = mysqli_real_escape_string($con, $_POST['correo']);
        $confirmacion = mysqli_real_escape_string($con, $_POST['confirmacion']);
        $confirmacionUsuario = new Usuario('', '', '', $correo,"","","",$confirmacion,"");
        $operacion->confirmacionUsuario($confirmacionUsuario);
        //retorna a una pagina con el login hecho

        break;

    case 'registro':

        if(!empty($_POST))
        {
            $operacion = new Operaciones();
            $con = $operacion->conectar();
            //Con la funci�n real_escape se a�ade m�s seguridad para evitar inyecciones sql.
            $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
            $apellido = mysqli_real_escape_string($con, $_POST['apellidos']);
            $correo = mysqli_real_escape_string($con, $_POST['correo']);
            $contrasenya = mysqli_real_escape_string($con, md5($_POST['contrasenya']));
            $activo = 0;
            $registroUsuario = new Usuario($nombre,$apellido,$contrasenya,$correo,"","","","",$activo);
            //se da de alta un usuario
            $operacion->altaUsuario($registroUsuario);
            //retorna a la pagina en la que se estaba
        }
        break;

    case 'producto':
       

            $operacion = new Operaciones();
            $con = $operacion->conectar();

            $ID_usuario = $_SESSION['ID_USUARIO'];
            $nombre = $_SESSION['nombreProducto'];
            $ciudad = $_SESSION['ciudadProducto'];
            $descripcion = $_SESSION['descripcionProducto'];
            $precio = $_SESSION['precioProducto'];
            $tema = $_SESSION['temaProducto'];
            $url1 = $_SESSION['imagen1Producto'];
            $url2 = $_SESSION['imagen2Producto'];
            $url3 = $_SESSION['imagen3Producto'];
            $url4 = $_SESSION['imagen4Producto'];
            $url5 = $_SESSION['imagen5Producto'];

            $altaProducto = new Producto($ID_usuario,$nombre,$ciudad,$descripcion,$precio,$tema);


            //se da de alta un usuario
            $operacion->altaProducto($altaProducto);


            $data = select_id_producto();

            if ($_SESSION['imagen1Producto']!=$_SESSION['ID_USUARIO']){
                $altaImagen1Producto = new ImagenProducto(1,$data,$url1);
                $operacion->altaImagenProducto($altaImagen1Producto);
            }

            if ($_SESSION['imagen2Producto']!=$_SESSION['ID_USUARIO']){
                $altaImagen2Producto = new ImagenProducto(2,$data,$url2);
                $operacion->altaImagenProducto($altaImagen2Producto);
            }

            if ($_SESSION['imagen3Producto']!=$_SESSION['ID_USUARIO']){
                $altaImagen3Producto = new ImagenProducto(3,$data,$url3);
                $operacion->altaImagenProducto($altaImagen3Producto);
            }

            if ($_SESSION['imagen4Producto']!=$_SESSION['ID_USUARIO']){
                $altaImagen4Producto = new ImagenProducto(4,$data,$url4);
                $operacion->altaImagenProducto($altaImagen4Producto);
            }

            if ($_SESSION['imagen5Producto']!=$_SESSION['ID_USUARIO']){
                $altaImagen5Producto = new ImagenProducto(5,$data,$url5);
                $operacion->altaImagenProducto($altaImagen5Producto);
            }

        
        break;

    case 'servicio':
        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $ID_usuario = $_SESSION['ID_USUARIO'];
        $nombre = $_SESSION['nombreServicio'];
        $ciudad = $_SESSION['ciudadServicio'];
        $descripcion = $_SESSION['descripcionServicio'];
        $precio = $_SESSION['precioServicio'];
        $tema = $_SESSION['temaServicio'];
        $url1 = $_SESSION['imagen1Servicio'];
        $url2 = $_SESSION['imagen2Servicio'];
        $url3 = $_SESSION['imagen3Servicio'];

        $altaServicio = new Servicio($ID_usuario,$nombre,$ciudad,$descripcion,$precio,$tema);


        //se da de alta un usuario
        $operacion->altaServicio($altaServicio);


        $data = select_id_servicio();

        if ($_SESSION['imagen1Servicio']!=$_SESSION['ID_USUARIO']){
            $altaImagen1Servicio = new ImagenServicio(1,$data,$url1);
            $operacion->altaImagenServicio($altaImagen1Servicio);
        }

        if ($_SESSION['imagen2Servicio']!=$_SESSION['ID_USUARIO']){
            $altaImagen2Servicio = new ImagenServicio(2,$data,$url2);
            $operacion->altaImagenServicio($altaImagen2Servicio);
        }

        if ($_SESSION['imagen3Servicio']!=$_SESSION['ID_USUARIO']){
            $altaImagen3Servicio = new ImagenServicio(3,$data,$url3);
            $operacion->altaImagenServicio($altaImagen3Servicio);
        }
        break;
    case 'changeImageService':
        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $ID_usuario = $_SESSION['ID_USUARIO'].'_';
        $url1 = $_SESSION['imagen1Servicio'];
        $url2 = $_SESSION['imagen2Servicio'];
        $url3 = $_SESSION['imagen3Servicio'];

        if ($_SESSION['imagen1Servicio']!=$ID_usuario){
            $altaImagen1Servicio = new ImagenServicio(1,$_SESSION['ID_servicio'],$url1);
            $operacion->cambioImagenServicio($altaImagen1Servicio);
        }

        if ($_SESSION['imagen2Servicio']!=$ID_usuario){
            $altaImagen2Servicio = new ImagenServicio(2,$_SESSION['ID_servicio'],$url2);
            $operacion->cambioImagenServicio($altaImagen2Servicio);
        }

        if ($_SESSION['imagen3Servicio']!=$ID_usuario){
            $altaImagen3Servicio = new ImagenServicio(3,$_SESSION['ID_servicio'],$url3);
            $operacion->cambioImagenServicio($altaImagen3Servicio);
        }
        break;

    case 'changeImageProduct':
        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $ID_usuario = $_SESSION['ID_USUARIO'].'_';
        $url1 = $_SESSION['imagen1Producto'];
        $url2 = $_SESSION['imagen2Producto'];
        $url3 = $_SESSION['imagen3Producto'];
        $url4 = $_SESSION['imagen4Producto'];
        $url5 = $_SESSION['imagen5Producto'];

        if ($_SESSION['imagen1Producto']!=$ID_usuario){
            $altaImagen1Producto = new ImagenProducto(1,$_SESSION['ID_producto'],$url1);
            $operacion->cambioImagenProducto($altaImagen1Producto);
        }

        if ($_SESSION['imagen2Producto']!=$ID_usuario){
            $altaImagen2Producto = new ImagenProducto(2,$_SESSION['ID_producto'],$url2);
            $operacion->cambioImagenProducto($altaImagen2Producto);
        }

        if ($_SESSION['imagen3Producto']!=$ID_usuario){
            $altaImagen3Producto = new ImagenProducto(3,$_SESSION['ID_producto'],$url3);
            $operacion->cambioImagenProducto($altaImagen3Producto);
        }

        if ($_SESSION['imagen4Producto']!=$ID_usuario){
            $altaImagen4Producto = new ImagenProducto(4,$_SESSION['ID_producto'],$url4);
            $operacion->cambioImagenProducto($altaImagen4Producto);
        }

        if ($_SESSION['imagen5Producto']!=$ID_usuario){
            $altaImagen5Producto = new ImagenProducto(5,$_SESSION['ID_producto'],$url5);
            $operacion->cambioImagenProducto($altaImagen5Producto);
        }
        break;

    case 'usuario':

        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $telefono = mysqli_real_escape_string($con, $_POST['telefono']);
        $ciudad = mysqli_real_escape_string($con, $_POST['ciudad']);

        $updateUsuario = new Usuario("","","","",$ciudad,$telefono,"","","","");
        $operacion->updateUsuario($updateUsuario);


        break;

    case 'contrasenyaUsuario':


        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $contrasenya_antigua = $_SESSION['contrasenya'];

        $password0 = mysqli_real_escape_string($con, $_POST['password0']);
        $password1 = mysqli_real_escape_string($con, $_POST['password1']);
        $password2 = mysqli_real_escape_string($con, $_POST['password2']);

        if ($password0==""){
            $password=$contrasenya_antigua;
        }else{
            $password=md5($password0);
        }

        if ($password1==""){
            $password1=$contrasenya_antigua;
        }

        if ($password2==""){
            $password2=$contrasenya_antigua;
        }

        if ($password==$contrasenya_antigua){
            if ($password1==$password2){
                $updateContrasenyaUsuario = new Usuario("","",$password2,"","","","","","");
                $operacion->updateContrasenyaUsuario($updateContrasenyaUsuario);
            }else{
                echo "<script language='javascript'>alert('Las nuevas 2 contrasenyas no coinciden');</script>";
            }
        }else{
            echo $password0;
            echo $contrasenya_antigua;
            echo $password;
        }
        break;

    case 'modificarProducto':


        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $ID_usuario = $_SESSION['ID_USUARIO'];

        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $ciudad = mysqli_real_escape_string($con, $_POST['ciudad']);
        $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
        $precio = mysqli_real_escape_string($con, $_POST['precio']);
        $tema = mysqli_real_escape_string($con, $_POST['tema']);


        $modificarProducto = new Producto($ID_usuario,$nombre,$ciudad,$descripcion,$precio,$tema);
        $operacion->modificarProducto($modificarProducto);
        break;

    case 'modificarServicio':
        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $ID_usuario = $_SESSION['ID_USUARIO'];

        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $ciudad = mysqli_real_escape_string($con, $_POST['ciudad']);
        $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
        $precio = mysqli_real_escape_string($con, $_POST['precio']);
        $tema = mysqli_real_escape_string($con, $_POST['tema']);


        $modificarServicio = new Servicio($ID_usuario,$nombre,$ciudad,$descripcion,$precio,$tema);
        $operacion->modificarServicio($modificarServicio);

        break;
    case 'eliminarProducto':

        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $ID_producto = $_SESSION['ID_producto'];
        $ID_usuario = $_SESSION['ID_USUARIO'];
        $carpeta = '../img/products/'.$ID_usuario.'/';
        $imagen1 = select_imagen_producto(1,$ID_producto);
        $imagen2 = select_imagen_producto(2,$ID_producto);
        $imagen3 = select_imagen_producto(3,$ID_producto);
        $imagen4 = select_imagen_producto(4,$ID_producto);
        $imagen5 = select_imagen_producto(5,$ID_producto);

        if($imagen1!=''){
            echo unlink($carpeta.$imagen1);
        }
        if($imagen2!=''){
            echo unlink($carpeta.$imagen2);
        }
        if($imagen3!=''){
            echo unlink($carpeta.$imagen3);
        }
        if($imagen4!=''){
            echo unlink($carpeta.$imagen4);
        }
        if($imagen5!=''){
            echo unlink($carpeta.$imagen5);
        }

        $operacion->eliminarProducto();

        break;
    case 'eliminarServicio':
        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $operacion->eliminarServicio();

        break;
    case 'eliminarProductoYa':

        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $ID_producto = mysqli_real_escape_string($con, $_POST['variable1']);
        $password0 = mysqli_real_escape_string($con, $_POST['password0']);
        $contrasenya_antigua = $_SESSION['contrasenya'];
        $ID_usuario = $_SESSION['ID_USUARIO'];
        $carpeta = '../img/products/'.$ID_usuario.'/';
        $imagen1 = select_imagen_producto(1,$ID_producto);
        $imagen2 = select_imagen_producto(2,$ID_producto);
        $imagen3 = select_imagen_producto(3,$ID_producto);
        $imagen4 = select_imagen_producto(4,$ID_producto);
        $imagen5 = select_imagen_producto(5,$ID_producto);

        if ($password0==""){
            $password=$contrasenya_antigua;
        }else{
            $password=md5($password0);
        }

        if($password==$contrasenya_antigua) {
            if ($imagen1 != '') {
                echo unlink($carpeta . $imagen1);
            }
            if ($imagen2 != '') {
                echo unlink($carpeta . $imagen2);
            }
            if ($imagen3 != '') {
                echo unlink($carpeta . $imagen3);
            }
            if ($imagen4 != '') {
                echo unlink($carpeta . $imagen4);
            }
            if ($imagen5 != '') {
                echo unlink($carpeta . $imagen5);
            }

            $operacion->eliminarProductoYa($ID_producto);
        }else{
            echo '<script language="javascript">alert("Error, el password no coincide");</script>';
        }

        break;

    case 'eliminarServicioYa':
        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $ID_servicio = mysqli_real_escape_string($con, $_POST['variable1']);
        $password0 = mysqli_real_escape_string($con, $_POST['password0']);
        $contrasenya_antigua = $_SESSION['contrasenya'];
        $ID_usuario = $_SESSION['ID_USUARIO'];
        $carpeta = '../img/services/'.$ID_usuario.'/';
        $imagen1 = select_imagen_servicio(1,$ID_servicio);
        $imagen2 = select_imagen_servicio(2,$ID_servicio);
        $imagen3 = select_imagen_servicio(3,$ID_servicio);

        if ($password0==""){
            $password=$contrasenya_antigua;
        }else{
            $password=md5($password0);
        }

        if($password==$contrasenya_antigua) {
            if($imagen1!=''){
                echo unlink($carpeta.$imagen1);
            }
            if($imagen2!=''){
                echo unlink($carpeta.$imagen2);
            }
            if($imagen3!=''){
                echo unlink($carpeta.$imagen3);
            }

            $operacion->eliminarServicioYa($ID_servicio);
        }else{
            echo '<script language="javascript">alert("Error, el password no coincide");</script>';
        }

        break;

    case 'eliminarUsuario':
        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $correo = mysqli_real_escape_string($con, $_POST['correo']);
        $password0 = mysqli_real_escape_string($con, $_POST['password0']);
        $contrasenya_antigua = $_SESSION['contrasenya'];

        if ($password0==""){
            $password=$contrasenya_antigua;
        }else{
            $password=md5($password0);
        }

        if($password==$contrasenya_antigua){
            if($correo==$_SESSION['correo']){

                $ID_usuario = $_SESSION['ID_USUARIO'];

                $carpetaUsuario = '../img/user_logo/'.$ID_usuario;
                $carpetaProductos = '../img/products/'.$ID_usuario;
                $carpetaServicios = '../img/services/'.$ID_usuario;

                if (file_exists($carpetaUsuario)) {
                    eliminarDir($carpetaUsuario);
                }

                if (file_exists($carpetaProductos)) {
                    eliminarDir($carpetaProductos);
                }

                if (file_exists($carpetaServicios)) {
                    eliminarDir($carpetaServicios);
                }

                $operacion->eliminarUsuario();

            }else{
                echo '<script language="javascript">alert("Error, el correo escrito no coincide con el tuyo");</script>';
            }
        }else{
            echo '<script language="javascript">alert("Error, el password no coincide");</script>';
        }

        break;

    case 'buscar':
        $operacion = new Operaciones();
        $con = $operacion->conectar();
        $palabra = mysqli_real_escape_string($con, $_POST['frase']);
        $operacion->buscador($palabra);
        break;

    case 'anadirPalabra':

        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $ID_usuario = $_SESSION['ID_USUARIO'];
        $palabra = mysqli_real_escape_string($con, $_POST['palabra']);

        $altaPalabraUsuario = new Palabra($palabra,$ID_usuario);
        $operacion->altaPalabraUsuario($altaPalabraUsuario);
        break;

    case 'eliminarPalabra':
        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $ID_usuario = $_SESSION['ID_USUARIO'];
        $palabra = mysqli_real_escape_string($con, $_POST['palabra']);

        $eliminarPalabraUsuario = new Palabra($palabra,$ID_usuario);
        $operacion->eliminarPalabra($eliminarPalabraUsuario);

        break;

    case 'anadirDeseo':

        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $ID_usuario = $_SESSION['ID_USUARIO'];
        $deseo = mysqli_real_escape_string($con, $_POST['deseo']);

        $altaDeseoUsuario = new Deseo($deseo,$ID_usuario);
        $operacion->altaDeseoUsuario($altaDeseoUsuario);
        break;

    case 'eliminarDeseo':
        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $ID_usuario = $_SESSION['ID_USUARIO'];
        $deseo = mysqli_real_escape_string($con, $_POST['deseo']);

        $eliminarDeseoUsuario = new Deseo($deseo,$ID_usuario);
        $operacion->eliminarDeseo($eliminarDeseoUsuario);

        break;

    case 'desconectar':

        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $operacion->desconectarse();
        break;

    case 'venderProducto':

        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $ID_producto = mysqli_real_escape_string($con, $_POST['variable1']);
        $password0 = mysqli_real_escape_string($con, $_POST['password0']);
        $contrasenya_antigua = $_SESSION['contrasenya'];
        $ID_usuario = $_SESSION['ID_USUARIO'];
        $carpeta = '../img/products/'.$ID_usuario.'/';
        $imagen1 = select_imagen_producto(1,$ID_producto);
        $imagen2 = select_imagen_producto(2,$ID_producto);
        $imagen3 = select_imagen_producto(3,$ID_producto);
        $imagen4 = select_imagen_producto(4,$ID_producto);
        $imagen5 = select_imagen_producto(5,$ID_producto);

        $usuarioVendido = isset($_POST['usuario']) ? $_POST['usuario'] : NULL;

        if ($password0==""){
            $password=$contrasenya_antigua;
        }else{
            $password=md5($password0);
        }

        if($password==$contrasenya_antigua) {

            if( is_null($usuarioVendido) ){
                if ($imagen1 != '') {
                    echo unlink($carpeta . $imagen1);
                }
                if ($imagen2 != '') {
                    echo unlink($carpeta . $imagen2);
                }
                if ($imagen3 != '') {
                    echo unlink($carpeta . $imagen3);
                }
                if ($imagen4 != '') {
                    echo unlink($carpeta . $imagen4);
                }
                if ($imagen5 != '') {
                    echo unlink($carpeta . $imagen5);
                }

                $operacion->eliminarProductoYa($ID_producto);

            }else{

                $venderProducto = new ValoracionProducto($ID_producto,$usuarioVendido,$ID_usuario,"","");
                $operacion->productoVendido($venderProducto);
            }
        }else{
            echo '<script language="javascript">alert("Error, el password no coincide");</script>';
        }

        break;

    case 'venderServicio':

        $operacion = new Operaciones();
        $con = $operacion->conectar();

        $ID_servicio = mysqli_real_escape_string($con, $_POST['variable1']);
        $usuarioVendido = isset($_POST['usuario']) ? $_POST['usuario'] : NULL;
        $password0 = mysqli_real_escape_string($con, $_POST['password0']);
        $contrasenya_antigua = $_SESSION['contrasenya'];
        $ID_usuario = $_SESSION['ID_USUARIO'];
        $carpeta = '../img/services/'.$ID_usuario.'/';
        $imagen1 = select_imagen_servicio(1,$ID_servicio);
        $imagen2 = select_imagen_servicio(2,$ID_servicio);
        $imagen3 = select_imagen_servicio(3,$ID_servicio);

        if ($password0==""){
            $password=$contrasenya_antigua;
        }else{
            $password=md5($password0);
        }

        if($password==$contrasenya_antigua) {

            if( is_null($usuarioVendido) ){
                if ($imagen1 != '') {
                    echo unlink($carpeta . $imagen1);
                }
                if ($imagen2 != '') {
                    echo unlink($carpeta . $imagen2);
                }
                if ($imagen3 != '') {
                    echo unlink($carpeta . $imagen3);
                }

                $operacion->eliminarServicioYa($ID_servicio);

            }else{
                $venderServicio = new ValoracionServicio($ID_servicio,$usuarioVendido,$ID_usuario,"","");
                $operacion->servicioVendido($venderServicio);
            }
        }else{
            echo '<script language="javascript">alert("Error, el password no coincide");</script>';
        }

        break;

     }

?>
</body>
</html>
