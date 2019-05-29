<?php 
error_reporting(E_ERROR | E_PARSE);
session_start();
class Operaciones {
    //conexi�n local con mysql posteriormente se modificara la conexi�n para estar en remoto
    private $servidor = "localhost";
    private $usuario = "id9442298_changeit";
    private $pass = "12345";
    private $nombreBd ="id9442298_changeit";
    
    public function conectar()
    {
        $con = mysqli_connect($this->servidor, $this->usuario, $this->pass, $this->nombreBd);
        return $con;
    }
    
    public function altaUsuario($usuario){
	    if(!empty($usuario->getNombre()) && !empty($usuario->getApellido()) && !empty($usuario->getContrasenya()) && !empty($usuario->getCorreo())) {

            $sql_Select = "SELECT correo FROM usuario WHERE correo='" . $usuario->getCorreo() . "'";

            $con = $this->conectar();
            $resultado = mysqli_query($con, $sql_Select);
            $para = "";

            $existe = $this->recorrer($resultado);
            //primero verifico si ya existe el correo si existe le envio un mensaje al usuario de lo contrario creo el nuevo usuario
            if ($existe['correo'] != $usuario->getCorreo()) {
                $aleatorio = rand(0, 10000);
                $sql_insert = ("INSERT INTO usuario
                (nombre, apellidos, contrasenya, correo, confirmacion, activo, compras, ventas, fecha)
                VALUES('{$usuario->getNombre()}','{$usuario->getApellido()}', '{$usuario->getContrasenya()}','{$usuario->getCorreo()}',$aleatorio,'{$usuario->getActivo()}',0,0,now())");

                if (mysqli_query($con, $sql_insert)) {

                    $para .= $usuario->getCorreo();

                    // título
                    $título = "Confirmación de ChangeIt";

                    // mensaje
                    $mensaje = '
                    <html>
                    <head>
                      <title>Confirmar correo de ChangeIt</title>
                    </head>
                    <body>
                      <p>Id de confirmación: '.$aleatorio.'</p>
                      </br>
                      <p>Ingresa tu correo y el ID de confirmación en el siguiente link: </p>
                      </br>
                      <p href="https://changeitorg.000webhostapp.com/ChangeIt/php/userNotLoggedIn/confirmation.php">Ingresa al siguiente link: https://changeitorg.000webhostapp.com/ChangeIt/php/userNotLoggedIn/confirmation.php</p>
                    </body>
                    </html>
                    ';

                    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    // Cabeceras adicionales
                    $cabeceras .= 'From: ChangeIt <changeit@gmail.com>' . "\r\n";

                    // Enviarlo
                    mail($para, $título, $mensaje, $cabeceras);

                    echo "<script type='text/javascript'>location.href='userLoggedIn/userMain.php';</script>";
                    header('Location: index.php');
                } else {
                    echo "Error al registrarse!";
                }
            } else {
                echo "El email ya existe! Por favor, intenta con otro!";
            }

        }else{
            echo  "Todos los campos no deben de estar vacios!";
        }
    }
    

    public function loginUsuario($usuario){

        $sql = "SELECT * FROM usuario WHERE correo='{$usuario->getCorreo()}' AND contrasenya='{$usuario->getContrasenya()}'";
                
        $con = $this->conectar();
        $resultado = mysqli_query($con,$sql);
        $existe = $this->recorrer($resultado);

        if($existe['activo']==1) {
        if($existe['correo'] == $usuario->getCorreo() && $existe['contrasenya'] == $usuario->getContrasenya()){
            //Aqui compruebo el la sesión si es para móvil o de lo contario para la web
            if($usuario->getNombre() == "movil")
            {
                $contenidoUsu = array('idUsuario' => $existe["ID_USUARIO"],'telefono' => $existe["telefono"],'nombre' => $existe["nombre"],'apellidos' => $existe["apellidos"],'correo' => $existe["correo"],'contrasenya'=>$existe['contrasenya'],'imagen'=>$existe['imagen'],'mensaje'=>"cuenta encontrada");
                 echo json_encode($contenidoUsu);
            }else
            {
                $sql_insert=("INSERT INTO historicousuario
                (ID_usuario, inicio_sesion)
                VALUES('{$existe["ID_USUARIO"]}',now())");

                if(mysqli_query($con,$sql_insert)){
                    $_SESSION['ID_USUARIO'] = $existe["ID_USUARIO"];
                    $_SESSION['nombre'] = $existe["nombre"];
                    $_SESSION['apellidos'] = $existe["apellidos"];
                    $_SESSION['correo'] = $existe["correo"];
                    $_SESSION['contrasenya'] = $existe['contrasenya'];
                    $_SESSION['ciudad'] = $existe['ciudad'];
                    $_SESSION['telefono'] = $existe['telefono'];
                    $_SESSION['imagen'] = $existe['imagen'];
                    $_SESSION['login_done'] = true;
                    echo "<script type='text/javascript'>location.href='userLoggedIn/userMain.php';</script>";
                } else {
                    echo "<script type='text/javascript'>location.href='index.php?error=login';</script>";
                }
            }
        }else{
            if($usuario->getNombre() == "movil")
            {
                echo 'Error, email o contrasenya incorrectos';
            }else
            {
                echo "<script type='text/javascript'>location.href='index.php?error=login';</script>";
            }
        }
        }else{
            if($usuario->getNombre() == "movil")
            {
                echo 'Error, email o contrasenya incorrectos';
            }else
            {
                echo "<script type='text/javascript'>location.href='index.php?error=login';</script>";
            }
        }
    }

    public function desconectarse(){

        $con = $this->conectar();
        $idUsuario=$_SESSION['ID_USUARIO'];

        $sql_update=("UPDATE historicousuario SET final_sesion=now() WHERE ID_USUARIO='$idUsuario' AND final_sesion IS NULL;");
        if(mysqli_query($con,$sql_update)){
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='logout.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error, la imagen no se pudo actualizar");</script>';
        }
    }

    public function confirmacionUsuario($usuario){


        $sql = "SELECT * FROM usuario "
            . "WHERE correo='{$usuario->getCorreo()}'";

        $con = $this->conectar();

        $resultado = mysqli_query($con,$sql);

        $existe = $this->recorrer($resultado);
        $correo=$existe['correo'];
        if($existe['activo']==0) {
            if($existe['correo'] == $usuario->getCorreo() && $existe['confirmacion'] == $usuario->getConfirmacion())
            {
                $con2 = $this->conectar();
                $sql_update=("UPDATE usuario SET activo=1 WHERE correo='$correo';");
                if(mysqli_query($con2,$sql_update)){
                    $_SESSION['ID_USUARIO'] = $existe["ID_USUARIO"];
                    $_SESSION['nombre'] = $existe["nombre"];
                    $_SESSION['apellidos'] = $existe["apellidos"];
                    $_SESSION['correo'] = $existe["correo"];
                    $_SESSION['contrasenya'] = $existe['contrasenya'];
                    $_SESSION['ciudad'] = $existe['ciudad'];
                    $_SESSION['telefono'] = $existe['telefono'];
                    $_SESSION['imagen'] = $existe['imagen'];
                    echo "<script type='text/javascript'>location.href='../index.php';</script>";
                } else {
                    echo '<script language="javascript">alert("Error, no se pudo actualizar");</script>';
                }
            }else{
                echo "<script language='javascript'>alert('Email o confirmacion incorrectos');</script>";
            }
        }else{
            echo "El usuario ya ha sido confirmado";
        }

    }

    public function updateUserImage($idUsuario){

        $con = $this->conectar();
        $url=$idUsuario.'_'.basename( $_FILES["fileToUpload"]["name"]);
        $sql_update=("UPDATE usuario SET imagen='$url' WHERE ID_USUARIO='$idUsuario';");
        if(mysqli_query($con,$sql_update)){
            $_SESSION['imagen'] = $url;
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='../editProfile.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error, la imagen no se pudo actualizar");</script>';
        }
    }

    public function updateUsuario($updateUsuario){
        $idUsuario=$_SESSION['ID_USUARIO'];
        $telefono=$updateUsuario->getTelefono();
        $ciudad=$updateUsuario->getCiudad();

        $con = $this->conectar();
        $sql_update=("UPDATE usuario SET telefono='$telefono', ciudad='$ciudad' WHERE ID_USUARIO='$idUsuario';");
        if(mysqli_query($con,$sql_update)){
            $_SESSION['telefono'] = $updateUsuario->getTelefono();
            $_SESSION['ciudad'] = $updateUsuario->getCiudad();
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/editProfile.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error, el usuario no se pudo actualizar");</script>';
        }
    }

    public function updateContrasenyaUsuario($updateContrasenyaUsuario){
        $idUsuario=$_SESSION['ID_USUARIO'];
        if ($updateContrasenyaUsuario->getContrasenya()==$_SESSION['contrasenya']){
            $password=$updateContrasenyaUsuario->getContrasenya();
        }else{
            $password=md5($updateContrasenyaUsuario->getContrasenya());
        }

        $con = $this->conectar();
        $sql_update=("UPDATE usuario SET contrasenya='$password' WHERE ID_USUARIO='$idUsuario';");
        if(mysqli_query($con,$sql_update)){
            $_SESSION['contrasenya'] = $password;
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error, la contrasenya no se pudo actualizar");</script>';
        }
    }

    public function altaProducto($producto)
    {
        $con = $this->conectar();
        $tema=$producto->getTema();
        $sql_insert=("INSERT INTO producto
                (ID_usuario, nombre, ciudad, descripcion, precio, tema, fecha, pendiente_valoracion)
                VALUES('{$producto->getIdUsuario()}','{$producto->getNombre()}','{$producto->getCiudad()}','{$producto->getDescripcion()}', 
                '{$producto->getPrecio()}','{$producto->getTema()}',now(), 0)");

        if(mysqli_query($con,$sql_insert)){

            $sql_update=("UPDATE categoriasproducto SET total = total + 1 WHERE ID_CAT_PROD='$tema';");
            if(mysqli_query($con,$sql_update)){
                $_SESSION['login_done'] = true;
                echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
            } else {
                echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
            }
            
        } else {
            echo '<script language="javascript">alert("error al subir producto");</script>';
        }

    }

    public function altaServicio($servicio)
    {
        $con = $this->conectar();
        $tema=$servicio->getTema();
        $sql_insert=("INSERT INTO servicio
                (ID_usuario, nombre, ciudad, descripcion, precio, tema, fecha, pendiente_valoracion)
                VALUES('{$servicio->getIdUsuario()}','{$servicio->getNombre()}','{$servicio->getCiudad()}','{$servicio->getDescripcion()}', 
                '{$servicio->getPrecio()}','{$servicio->getTema()}',now(), 0)");

        if(mysqli_query($con,$sql_insert)){
            $sql_update=("UPDATE categoriasservicio SET total = total + 1 WHERE ID_CAT_SERV='$tema';");
            if(mysqli_query($con,$sql_update)){
                $_SESSION['login_done'] = true;
                echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
            } else {
                echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
            }
        } else {
            echo '<script language="javascript">alert("Error al crear el servicio");</script>';
        }
    }

    public function altaImagenServicio($imagen)
    {
        $con = $this->conectar();
        $sql_insert=("INSERT INTO imagenservicio
                (ID_imagen, ID_servicio, url_servicio)
                VALUES('{$imagen->getIdImagen()}','{$imagen->getIdServicio()}','{$imagen->getUrl()}')");

        if(mysqli_query($con,$sql_insert)){
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error al subir la imagen a la bbdd");</script>';
            //echo "Error: <br><br>" . $sql_insert . "<br><br><br>" . $con->error;
        }
    }

    public function cambioImagenServicio($imagen)
    {
        $con = $this->conectar();
        $idImagen=$imagen->getIdImagen();
        $id_Servicio=$imagen->getIdServicio();
        $url=$imagen->getUrl();
        $sql_update=("UPDATE imagenservicio SET url_servicio='$url' WHERE ID_imagen='$idImagen' AND ID_servicio='$id_Servicio'");

        if(mysqli_query($con,$sql_update)){
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error al subir la imagen a la bbdd");</script>';
            //echo "Error: <br><br>" . $sql_insert . "<br><br><br>" . $con->error;
        }
    }

    public function cambioImagenProducto($imagen)
    {
        $con = $this->conectar();
        $idImagen=$imagen->getIdImagen();
        $id_Producto=$imagen->getIdProducto();
        $url=$imagen->getUrl();
        $sql_update=("UPDATE imagenproducto SET url_producto='$url' WHERE ID_imagen='$idImagen' AND ID_producto='$id_Producto'");

        if(mysqli_query($con,$sql_update)){
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error al subir la imagen a la bbdd");</script>';
            //echo "Error: <br><br>" . $sql_insert . "<br><br><br>" . $con->error;
        }
    }

    public function altaImagenProducto($imagen)
    {
        $con = $this->conectar();
        $sql_insert=("INSERT INTO imagenproducto
                (ID_imagen, ID_producto, url_producto)
                VALUES('{$imagen->getIdImagen()}','{$imagen->getIdProducto()}','{$imagen->getUrl()}')");

        if(mysqli_query($con,$sql_insert)){
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error al subir la imagen a la bbdd");</script>';
            //echo "Error: <br><br>" . $sql_insert . "<br><br><br>" . $con->error;
        }

    }

    public function modificarProducto($producto)
    {
        $con = $this->conectar();
        $ID_producto=$_SESSION['ID_producto'];
        $nombre=$producto->getNombre();
        $ciudad=$producto->getCiudad();
        $descripcion=$producto->getDescripcion();
        $precio=$producto->getPrecio();
        $tema=$producto->getTema();
        $sql_update=("UPDATE producto SET nombre='$nombre', ciudad='$ciudad', descripcion='$descripcion', precio='$precio', tema='$tema', fecha=now() WHERE ID_PRODUCTO='$ID_producto';");
        if(mysqli_query($con,$sql_update)){
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/editProduct.php?id=".$ID_producto."';</script>";
        } else {
            echo '<script language="javascript">alert("Error, el producto no se pudo actualizar");</script>';
        }

    }

    public function modificarServicio($servicio)
    {
        $con = $this->conectar();
        $ID_servicio=$_SESSION['ID_servicio'];
        $nombre=$servicio->getNombre();
        $ciudad=$servicio->getCiudad();
        $descripcion=$servicio->getDescripcion();
        $precio=$servicio->getPrecio();
        $tema=$servicio->getTema();
        $sql_update=("UPDATE servicio SET nombre='$nombre', ciudad='$ciudad',descripcion='$descripcion', precio='$precio', tema='$tema', fecha=now() WHERE ID_SERVICIO='$ID_servicio';");
        if(mysqli_query($con,$sql_update)){
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/editService.php?id=".$ID_servicio."';</script>";
        } else {
            echo "Error: <br><br>" . $sql_update . "<br><br><br>" . $con->error;
        }
    }

    public function eliminarProducto()
    {

        $con = $this->conectar();
        $ID_producto = $_SESSION['ID_producto'];
        $sql_delete=("DELETE FROM producto WHERE ID_PRODUCTO='$ID_producto';");
        if(mysqli_query($con,$sql_delete)){
            $sql_delete2=("DELETE FROM imagenproducto WHERE ID_producto='$ID_producto';");
            if(mysqli_query($con,$sql_delete2)){
                $_SESSION['login_done'] = true;
                echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
            } else {
                echo '<script language="javascript">alert("Error, las imagenes no se pudieron eliminar");</script>';
            }
        } else {
            echo '<script language="javascript">alert("Error, el producto no se pudo eliminar");</script>';
        }
    }

    public function eliminarServicio()
    {
        $con = $this->conectar();
        $ID_servicio = $_SESSION['ID_servicio'];
        $sql_update=("UPDATE servicio SET borrado = 1 WHERE ID_SERVICIO='$ID_servicio';");
        if(mysqli_query($con,$sql_update)){
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error, el servicio no se pudo eliminar");</script>';
        }
    }

    public function eliminarProductoYa($idProducto)
    {

        $con = $this->conectar();
        $ID_producto = $idProducto;
        $sql_delete=("DELETE FROM producto WHERE ID_PRODUCTO='$ID_producto';");
        if(mysqli_query($con,$sql_delete)){
            $sql_delete2=("DELETE FROM imagenproducto WHERE ID_producto='$ID_producto';");
            if(mysqli_query($con,$sql_delete2)){
                $_SESSION['login_done'] = true;
                echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
            } else {
                echo '<script language="javascript">alert("Error, las imagenes no se pudieron eliminar");</script>';
            }
        } else {
            echo '<script language="javascript">alert("Error, el producto no se pudo eliminar");</script>';
        }
    }

    public function eliminarServicioYa($idServicio)
    {

        $con = $this->conectar();
        $ID_servicio = $idServicio;
        $sql_delete=("DELETE FROM servicio WHERE ID_SERVICIO='$ID_servicio';");
        if(mysqli_query($con,$sql_delete)){
            $sql_delete2=("DELETE FROM imagenservicio WHERE ID_servicio='$ID_servicio';");
            if(mysqli_query($con,$sql_delete2)){
                $_SESSION['login_done'] = true;
                echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
            } else {
                echo '<script language="javascript">alert("Error, las imagenes no se pudieron eliminar");</script>';
            }
        } else {
            echo '<script language="javascript">alert("Error, el servicio no se pudo eliminar");</script>';
        }
    }

    public function eliminarUsuario()
    {
        $con = $this->conectar();
        $ID_usuario = $_SESSION['ID_USUARIO'];
        $sql_update=("UPDATE usuario SET activo=0 WHERE ID_USUARIO='$ID_usuario';");
        if(mysqli_query($con,$sql_update)){
            echo "<script type='text/javascript'>location.href='logout.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error, el usuario no se pudo eliminar");</script>';
        }
    }

    public function buscador($frase)
    {
        $con = $this->conectar();
        if(!empty($frase))
        {
            mysql_set_charset('utf8');
            $sql ="SELECT * FROM producto WHERE descripcion LIKE '%" .$frase. "%' OR nombre LIKE '%" .$frase. "%'";
            
            $resultado = mysqli_query($con,$sql);
            
        }
    }
    
    public function sentenciaRecuperarImagen($campos,$tabla,$condicion)
    {
        $con = $this->conectar();
        $sql = "SELECT ".$campos." FROM ".$tabla.$condicion;
        $res = mysqli_query($con, $sql);
        $existe = $this->recorrer($res);
        return $existe['url_producto'];
    }

     public function recorrer($valor)
     {
        return mysqli_fetch_array($valor);
     }

    public function altaDeseoUsuario($deseo)
    {
        $con = $this->conectar();
        $sql_insert=("INSERT INTO wishlist
                (deseo, ID_usuario)
                VALUES('{$deseo->getDeseo()}','{$deseo->getIdUsuario()}')");

        if(mysqli_query($con,$sql_insert)){
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/editProfile.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error al subir el deseo");</script>';
            //echo "Error: <br><br>" . $sql_insert . "<br><br><br>" . $con->error;
        }

    }

    public function eliminarDeseo($deseo)
    {

        $con = $this->conectar();
        $deseo2=$deseo->getDeseo();
        $sql_delete=("DELETE FROM wishlist WHERE deseo='$deseo2';");
        if(mysqli_query($con,$sql_delete)){
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/editProfile.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error, el deseo no se pudo eliminar");</script>';
        }
    }

    public function altaPalabraUsuario($palabra)
    {
        $con = $this->conectar();
        $sql_insert=("INSERT INTO buscadorpalabra
                (buscar_palabra, ID_usuario)
                VALUES('{$palabra->getBuscarPalabra()}','{$palabra->getIdUsuario()}')");

        if(mysqli_query($con,$sql_insert)){
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/editProfile.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error al subir la palabra");</script>';
            //echo "Error: <br><br>" . $sql_insert . "<br><br><br>" . $con->error;
        }

    }

    public function eliminarPalabra($palabra)
    {

        $con = $this->conectar();
        $palabra2=$palabra->getBuscarPalabra();
        $sql_delete=("DELETE FROM buscadorpalabra WHERE buscar_palabra='$palabra2';");
        if(mysqli_query($con,$sql_delete)){
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/editProfile.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error, la palabra no se pudo eliminar");</script>';
        }
    }

    public function productoVendido($producto)
    {
        $con = $this->conectar();
        $sql_update=("UPDATE producto SET pendiente_valoracion=1 WHERE ID_PRODUCTO='{$producto->getIdProducto()}';");
        if(mysqli_query($con,$sql_update)){
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error, no se pudo modificar el producto");</script>';
        }
    }

    public function servicioVendido($servicio)
    {
        $con = $this->conectar();
        $sql_update=("UPDATE servicio SET pendiente_valoracion=1 WHERE ID_Servicio='{$servicio->getIdServicio()}';");
        if(mysqli_query($con,$sql_update)){
            $_SESSION['login_done'] = true;
            echo "<script type='text/javascript'>location.href='userLoggedIn/profile.php';</script>";
        } else {
            echo '<script language="javascript">alert("Error, no se pudo modificar el servicio");</script>';
        }
    }
    
    public function buscadorPalabra($usuario)
    {
        if(strlen($usuario->getPalabra())> 3 )
        {          
            $cortarPalabra = substr($usuario->getPalabra(), 0, 3);
        }
        else{
            $cortarPalabra = $usuario->getPalabra();
        }
        $sql_Select = "SELECT * FROM buscadorpalabra WHERE ID_usuario='" . $usuario->getIdUsuario() . "' AND buscar_palabra   LIKE '%" .$cortarPalabra. "%' ";

        $con = $this->conectar();
        $resultado = mysqli_query($con, $sql_Select);

           
        $existe = $this->recorrer($resultado);
      
        if ($existe == '') {
            $sql_insert = ("INSERT INTO buscadorpalabra
            (buscar_palabra, ID_usuario)
            VALUES('{$usuario->getPalabra()}','{$usuario->getIdUsuario()}')");

            if (mysqli_query($con, $sql_insert)) {

                echo 'Palabra registrada';
            } else {
                echo "Error al registrar la palabra!";
            }
        } else {
            echo "La palabra ya existe!";
        }
    }
}

?>


