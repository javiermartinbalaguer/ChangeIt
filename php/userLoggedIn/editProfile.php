<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if ($_SESSION["login_done"] == true){
    include('../functions.php');
    ?>
    <!DOCTYPE html>
    <html>
    <head>

        <title>Proyecto</title>
        <meta charset="UTF-8">
        <link href="../../bootstrap/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
        <link href="../../css/editProfile.css" rel="stylesheet"/>

        <?php
        include '../masterPage/masterPageHeader.php';
        ?>

    </head>
    <body>


    <?php
    include '../masterPage/masterPageMenuConLogin.php';
    $idUsuario=$_SESSION['ID_USUARIO'];
    ?>

    <center>
        <div style="width: 90%">
            <div class="card hovercard">
                <div class="card-background">
                    <?php $imagen=select_imagen_usuario($idUsuario); ?>
                    <img class="card-bkimg" alt="" src="<?php echo '../../img/user_logo/'.$_SESSION["ID_USUARIO"].'/'.$_SESSION["imagen"]; ?>">
                    <!-- http://lorempixel.com/850/280/people/9/ -->
                </div>
                <div class="useravatar">
                    <img alt="" src="<?php echo '../../img/user_logo/'.$_SESSION["ID_USUARIO"].'/'.$_SESSION["imagen"]; ?>">
                </div>
                <?php $nombreUsuario=select_nombre_usuario($idUsuario); ?>
                <div class="card-info"> <span class="card-title"><?php echo $nombreUsuario ?></span>

                </div>
            </div>
            <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="button" id="favorites" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        <div class="hidden-xs">Editar Perfil</div>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" id="wishlist" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                        <div class="hidden-xs">Wishlist</div>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" id="stars" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        <div class="hidden-xs">Valoraciones</div>
                    </button>
                </div>
            </div>

            <div class="well">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1">
                        <!-- segunda prueba div -->
                        <div id="contentEdit">
                            <div id="editBox" class="row thumbnail">

                                <!-- Header -->
                                <h4 style="font-weight:bold">Perfil</h4>

                                <!-- Formulario -->
                                <form action="../main.php?tipo=usuario" method="post" enctype="multipart/form-data" class="line col-md-10">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Nombre</label>
                                        <input type="text" name="nombre" class="form-control" disabled placeholder="<?php echo $_SESSION['nombre'] ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputPassword1">Apellidos</label>
                                        <input type="text" name="apellido" class="form-control" disabled placeholder="<?php echo $_SESSION['apellidos'] ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputPassword1">Correo</label>
                                        <input type="text" name="email" class="form-control" disabled placeholder="<?php echo $_SESSION['correo'] ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Ciudad</label>
                                    <select name="ciudad"  class="form-control btn-group select_box input-sm">
                                        <option style="color:rgb(255,255,255,.5)" value="<?php echo $_SESSION['ciudad'] ?>"><?php echo $_SESSION['ciudad'] ?></option>
                                        <option value='selecciona'>Selecciona</option>
                                        <option value='A Coruña' >A Coruña</option>
                                        <option value='álava'>álava</option>
                                        <option value='Albacete' >Albacete</option>
                                        <option value='Alicante'>Alicante</option>
                                        <option value='Almería' >Almería</option>
                                        <option value='Asturias' >Asturias</option>
                                        <option value='ávila' >Ávila</option>
                                        <option value='Badajoz' >Badajoz</option>
                                        <option value='Barcelona'>Barcelona</option>
                                        <option value='Burgos' >Burgos</option>
                                        <option value='Cáceres' >Cáceres</option>
                                        <option value='Cádiz' >Cádiz</option>
                                        <option value='Cantabria' >Cantabria</option>
                                        <option value='Castellón' >Castellón</option>
                                        <option value='Ceuta' >Ceuta</option>
                                        <option value='Ciudad Real' >Ciudad Real</option>
                                        <option value='Córdoba' >Córdoba</option>
                                        <option value='Cuenca' >Cuenca</option>
                                        <option value='Gerona' >Gerona</option>
                                        <option value='Girona' >Girona</option>
                                        <option value='Las Palmas' >Las Palmas</option>
                                        <option value='Granada' >Granada</option>
                                        <option value='Guadalajara' >Guadalajara</option>
                                        <option value='Guipúzcoa' >Guipúzcoa</option>
                                        <option value='Huelva' >Huelva</option>
                                        <option value='Huesca' >Huesca</option>
                                        <option value='Jaén' >Jaén</option>
                                        <option value='La Rioja' >La Rioja</option>
                                        <option value='León' >León</option>
                                        <option value='Lleida' >Lleida</option>
                                        <option value='Lugo' >Lugo</option>
                                        <option value='Madrid' >Madrid</option>
                                        <option value='Malaga' >Málaga</option>
                                        <option value='Mallorca' >Mallorca</option>
                                        <option value='Melilla' >Melilla</option>
                                        <option value='Murcia' >Murcia</option>
                                        <option value='Navarra' >Navarra</option>
                                        <option value='Orense' >Orense</option>
                                        <option value='Palencia' >Palencia</option>
                                        <option value='Pontevedra'>Pontevedra</option>
                                        <option value='Salamanca'>Salamanca</option>
                                        <option value='Segovia' >Segovia</option>
                                        <option value='Sevilla' >Sevilla</option>
                                        <option value='Soria' >Soria</option>
                                        <option value='Tarragona' >Tarragona</option>
                                        <option value='Tenerife' >Tenerife</option>
                                        <option value='Teruel' >Teruel</option>
                                        <option value='Toledo' >Toledo</option>
                                        <option value='Valencia' >Valencia</option>
                                        <option value='Valladolid' >Valladolid</option>
                                        <option value='Vizcaya' >Vizcaya</option>
                                        <option value='Zamora' >Zamora</option>
                                        <option value='Zaragoza'>Zaragoza</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Teléfono</label>
                                        <input type="number" name="telefono" value="<?php echo $_SESSION['telefono'] ?>" class="form-control">
                                    </div>

                                    <!-- Boton modificar -->
                                    <button type="submit" style="float:right;margin-top:18px" class="btn btn-primary">Modificar</button>
                                </form>

                                <!-- Imagen -->
                                <div class="media" style="margin-top:0px;">
                                    <form action="uploadImages/uploadImageProfile.php" method="post" enctype="multipart/form-data">
                                        <a>
                                            <img class="media-object" style="cursor:pointer;width:160px;max-height:150px" src="<?php
                                            if ($_SESSION["imagen"]==null){
                                                echo "../../img/sinImagenPerfil2.png";
                                            }else{
                                                echo '../../img/user_logo/'.$_SESSION["ID_USUARIO"].'/'.$_SESSION["imagen"];
                                            }

                                            ?>"/>
                                            <center>
                                                <input type="button" data-toggle="modal" data-target="#cambiarImagenPerfil" style="margin-top:18px;" class="btn btn-default btn-sm" value="Cambiar imagen"/>
                                            </center>
                                        </a>
                                    </form>
                                </div>

                                <!-- Boton contraseña -->
                                <div class="form-group" style="padding:0px 15px; margin-top: 50px;">
                                    <div class="col-sm-offset-0 col-sm-12">
                                        <button  data-toggle="modal" data-target="#changePass" data-title="cambiarContraseña" role="button" type="submit" style="float:left;margin-top:-40px;" class="btn btn-default btn-sm">Cambiar contraseña</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Modal imagen perfil -->
                        <div id="cambiarImagenPerfil" class="modal fade">
                            <div class="modal-dialog" style="margin-top:50px !important">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Cambiar imagen de perfil</h4>
                                    </div>
                                    <center>
                                        <div class="modal-body">

                                            <form action="uploadImages/uploadImageProfile.php" method="post" enctype="multipart/form-data">

                                                <input id="imagenPerfil" name="fileToUpload" type="file">

                                                <script>
                                                    $("#imagenPerfil").fileinput({
                                                        uploadUrl: true,
                                                        allowedFileExtensions: ["jpg", "png", "gif"],
                                                        maxImageWidth: 200,
                                                        maxFileCount: 1,
                                                        initialPreviewShowUpload: false,
                                                        showUpload: false,
                                                        autoReplace: true,
                                                        resizeImage: true,
                                                        browseClass: "btn btn-primary btn-block",
                                                        showCaption: false,
                                                        uploadAsync: true,
                                                        showRemove: false
                                                    });
                                                </script>

                                                <div class="modal-footer" style="margin-top:15px;">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary"  Value="Registro" >Enviar</button>
                                                </div>

                                            </form>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>



                        <!--MODAL CAMBIAR CONTRASEÑA-->
                        <div id="changePass" class="modal fade">
                            <div class="modal-dialog" style="margin-top:50px !important">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Cambia tu contraseña</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../main.php?tipo=contrasenyaUsuario" method="POST">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Contraseña Actual</label>
                                                <input type="password" name="password0" id="actualPass" class="form-control"  placeholder="Contraseña actual">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Nueva Contraseña</label>
                                                <input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" style="margin-bottom:5px;">
                                                <input type="password" name="password2" id="contrasenya" class="form-control"  placeholder="Repite la contraseña" style="margin-bottom:5px;">
                                                <label style="font-size:11px; font-weight:normal;">La contraseña debe tener como mínimo 8 carácteres, formados por letras y números.</label>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary"  Value="Registrarse" >Enviar</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <center>
                            <button data-toggle="modal" data-target="#deleteUser" role="button" type="submit" style="width: 70%;margin-top:18px;background-color: indianred;
    border-color: #df382c;" class="btn btn-danger">Eliminar cuenta</button>
                        </center>

                        <!--MODAL ELIMINAR CUENTA-->
                        <div id="deleteUser" class="modal fade">
                            <div class="modal-dialog" style="margin-top:50px !important">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Eliminar cuenta</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../main.php?tipo=eliminarUsuario" method="POST">
                                            <center>
                                                <div style="margin-top:10px;margin-bottom:20px" class="form-group btn btn-danger">
                                                    <label style="color:black">Se borraran todos los datos de esta cuenta, incluidos productos y servicios</label></br>
                                                    <label style="color:black">Estas seguro que la quieres eliminar?</label>
                                                </div>
                                            </center>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Escribe tu correo para confirmar</label>
                                                <input type="text" name="correo" class="form-control" placeholder="Correo" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword">Escribe tu password para confirmar</label>
                                                <input type="password" name="password0" class="form-control" placeholder="Password" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-danger">Eliminar cuenta</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                    
                    <div class="tab-pane fade in" id="tab2">
                        <!-- Lista de deseos -->
                        <div id="contentEdit">
                            <div id="editBox" class="row thumbnail">

                                <!-- Header -->
                                <h4 style="font-weight:bold">Lista de deseos</h4>

                                <?php
                                $data = select_deseo_usuario($_SESSION['ID_USUARIO']);
                                // output data of each row
                                while ($row = $data->fetch_assoc()) {
                                    $pkPr= $row['ID_WISHLIST'];
                                    ?>
                                    <div class="btn-group" style="margin-top:10px;margin-left:10px;">
                                        <form action="../main.php?tipo=eliminarDeseo" method="POST">
                                            <div class="btn-group">
                                                <input type="hidden" name="deseo" value="<?php echo $row['deseo'] ?>">
                                                <button id="nombreDeseo" type="button" class="btn btn-primary"><?php echo $row['deseo']?></button>
                                                <button type="submit" class="btn btn-danger">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                }
                                ?>

                                <!-- Boton añadir deseo -->
                                <div class="form-group" style="padding:0px 15px; margin-top: -50px; margin-bottom: 50px">
                                    <div class="col-sm-offset-0 col-sm-12">
                                        <button data-toggle="modal" data-target="#anadirDeseo" data-title="anadirDeseo" role="button" type="submit" style="float:left;margin-top:18px;" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus"></span></button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--MODAL AÑADIR DESEO-->
                        <div id="anadirDeseo" class="modal fade">
                            <div class="modal-dialog" style="margin-top:50px !important">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Añade un deseo</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../main.php?tipo=anadirDeseo" method="POST">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Añadir deseo</label>
                                                <input type="text" name="deseo" id="deseo" class="form-control"  placeholder="Añadir deseo">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary"  Value="Registrarse" >Enviar</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Lista de palabras para buscar -->
                        <div id="contentEdit">
                            <div id="editBox" class="row thumbnail">

                                <!-- Header -->
                                <h4 style="font-weight:bold">Palabras que buscas</h4>

                                <?php
                                $data = select_buscar_palabra_usuario($_SESSION['ID_USUARIO']);
                                // output data of each row
                                while ($row = $data->fetch_assoc()) {
                                    $pkPr= $row['ID_BUSCADOR'];
                                    ?>
                                    <div class="btn-group" style="margin-top:10px;margin-left:10px;">
                                        <form action="../main.php?tipo=eliminarPalabra" method="POST">
                                            <div class="btn-group">
                                                <input type="hidden" name="palabra" value="<?php echo $row['buscar_palabra'] ?>">
                                                <button id="nombrePalabra" type="button" class="btn btn-primary"><?php echo $row['buscar_palabra']?></button>
                                                <button type="submit" class="btn btn-danger">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                }
                                ?>

                                <!-- Boton añadir palabra -->
                                <div class="form-group" style="padding:0px 15px; margin-top: -50px; margin-bottom: 50px">
                                    <div class="col-sm-offset-0 col-sm-12">
                                        <button data-toggle="modal" data-target="#anadirPalabra" data-title="anadirPalabra" role="button" type="submit" style="float:left;margin-top:18px;" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus"></span></button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--MODAL AÑADIR PALABRA QUE BUSCAR-->
                        <div id="anadirPalabra" class="modal fade">
                            <div class="modal-dialog" style="margin-top:50px !important">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Añade una palabra</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../main.php?tipo=anadirPalabra" method="POST">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Añadir palabra</label>
                                                <input type="text" name="palabra" id="palabra" class="form-control" placeholder="Añadir palabra">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary"  Value="Registrarse" >Enviar</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="tab-pane fade in" id="tab2">

                    </div>
                </div>
            </div>

        </div>
    </center>

    </body>
    <?php
    include '../masterPage/masterPageFooter.php';
    ?>

    </html>
    <?php
} else {
    header("location:../index.php");
}
?>