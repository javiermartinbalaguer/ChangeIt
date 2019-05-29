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

    <?php
    include '../masterPage/masterPageHeader.php';
    ?>

</head>
<body>

<?php
include '../masterPage/masterPageMenuConLogin.php';
?>

<!-- Boton Buscador -->
<div id="nav-bar-2" style="height: 110px;" class="navbar-fixed-top col-md-12">
    <!--<button type="button" class="buscar btn btn-default btn-sm col-md-2 col-md-offset-5" data-toggle="modal" data-target="#myModal">Buscador   <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>-->

    <!-- Nuevo Producto -->
    <button data-toggle="modal" data-target="#producto" class="form-control" id="inputAnadirProducto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRODUCTO
        <div class="esferaAnadirProducto">
            <img style="margin-top: 3px; margin-left:-0.7px; height: 25px; width: 25px" src="../../img/iconos/anadir.png">
        </div>
    </button>
    <!-- Nuevo Servicio -->
    <button data-toggle="modal" data-target="#servicio" class="form-control" id="inputAnadirServicio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SERVICIO
        <div class="esferaAnadirServicio">
            <img style="margin-top: 3px; margin-left:-0.9px; height: 25px; width: 25px" src="../../img/iconos/anadir.png">
        </div>
    </button>
</div>

<?php
include 'newProduct.php';
?>

<script type="text/javascript">
    function capturarf5(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code == 116) {
            return false;
        }
    }
    document.onkeydown=capturarf5;
</script>

<?php
    if ($_GET['idProducto']!=0){
?>
    <script type="text/javascript">
        $(document).ready(function() {

                $('#eliminarProducto').modal('show');

        });
    </script>
<?php
    }
?>

<?php
if ($_GET['idServicio']!=0){
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#eliminarServicio').modal('show');

        });
    </script>
    <?php
}
?>

<div id="galeria">
    <div id="row">
    <!-- COLUMNA PRODUCTO PAR -->
    <div id="columnas-div" class="col-sm-3 col-md-3">
        <!-- div -->
        <?php
        $data = select_all_producto_par($_SESSION["ID_USUARIO"]);

        if ($data->num_rows > 0) {
        // output data of each row
        while ($row = $data->fetch_assoc()) {
            $idProducto = $row['ID_PRODUCTO'];
        $imagen1 = select_imagen_producto(1,$row['ID_PRODUCTO']);
        $imagen2 = select_imagen_producto(2,$row['ID_PRODUCTO']);
        $imagen3 = select_imagen_producto(3,$row['ID_PRODUCTO']);
        $imagen4 = select_imagen_producto(4,$row['ID_PRODUCTO']);
        $imagen5 = select_imagen_producto(5,$row['ID_PRODUCTO']);
        ?>
        <div>
            <div onclick="editProduct(<?php echo $row['ID_PRODUCTO'] ?>)" class="thumbnail mostrarProducto sinBordeAbajo">
                <img style="width: 100%" src="<?php
                if ($imagen1==$row['ID_usuario'].'_'){
                    if ($imagen2==$row['ID_usuario'].'_'){
                        if ($imagen3==$row['ID_usuario'].'_'){
                            if ($imagen4==$row['ID_usuario'].'_'){
                                if ($imagen5==$row['ID_usuario'].'_'){
                                    echo "../../img/pordefecto.png";
                                }else{
                                    echo '../../img/products/'.$row['ID_usuario'].'/'.$imagen5;
                                }
                            }else{
                                echo '../../img/products/'.$row['ID_usuario'].'/'.$imagen4;
                            }
                        }else{
                            echo '../../img/products/'.$row['ID_usuario'].'/'.$imagen3;
                        }
                    }else{
                        echo '../../img/products/'.$row['ID_usuario'].'/'.$imagen2;
                    }
                }else{
                    echo '../../img/products/'.$row['ID_usuario'].'/'.$imagen1;
                }

                ?>"/>
                <div class="caption">
                    <h1><?php echo $row['nombre']?></h1>
                    <h5><?php echo $row['precio']?>&nbsp;€</h5>
                </div>


            </div>

            <!-- Boton eliminar producto -->
            <button onclick="enviarIdProducto(<?php echo $idProducto ?>)" id="botonEliminar" role="button" type="button" class="buttonEliminar glyphicon glyphicon-trash"></button>


        </div>
            <?php
        }
        } else {
            echo "<div style='height:750px;'></div>";
        }
        ?>

    </div>

    <!-- COLUMNA PRODUCTO IMPAR -->
    <div id="columnas-div" class="col-sm-3 col-md-3">
        <!-- div -->
        <?php
        $data = select_all_producto_impar($_SESSION["ID_USUARIO"]);

        if ($data->num_rows > 0) {
            // output data of each row
            while ($row = $data->fetch_assoc()) {
                $idProducto = $row['ID_PRODUCTO'];
                $imagen1 = select_imagen_producto(1,$row['ID_PRODUCTO']);
                $imagen2 = select_imagen_producto(2,$row['ID_PRODUCTO']);
                $imagen3 = select_imagen_producto(3,$row['ID_PRODUCTO']);
                $imagen4 = select_imagen_producto(4,$row['ID_PRODUCTO']);
                $imagen5 = select_imagen_producto(5,$row['ID_PRODUCTO']);
                ?>
                <div>
                    <div onclick="editProduct(<?php echo $row['ID_PRODUCTO'] ?>)" class="thumbnail mostrarProducto">
                        <img style="width: 100%" src="<?php
                        if ($imagen1==$row['ID_usuario'].'_'){
                            if ($imagen2==$row['ID_usuario'].'_'){
                                if ($imagen3==$row['ID_usuario'].'_'){
                                    if ($imagen4==$row['ID_usuario'].'_'){
                                        if ($imagen5==$row['ID_usuario'].'_'){
                                            echo "../../img/pordefecto.png";
                                        }else{
                                            echo '../../img/products/'.$row['ID_usuario'].'/'.$imagen5;
                                        }
                                    }else{
                                        echo '../../img/products/'.$row['ID_usuario'].'/'.$imagen4;
                                    }
                                }else{
                                    echo '../../img/products/'.$row['ID_usuario'].'/'.$imagen3;
                                }
                            }else{
                                echo '../../img/products/'.$row['ID_usuario'].'/'.$imagen2;
                            }
                        }else{
                            echo '../../img/products/'.$row['ID_usuario'].'/'.$imagen1;
                        }

                        ?>"/>
                        <div class="caption">
                            <h1><?php echo $row['nombre']?></h1>
                            <h5><?php echo $row['precio']?>&nbsp;€</h5>
                        </div>
                    </div>
                    <!-- Boton eliminar producto -->
                    <button onclick="enviarIdProducto(<?php echo $idProducto ?>)" id="botonEliminar" role="button" type="button" class="buttonEliminar glyphicon glyphicon-trash"></button>

                </div>
                <?php
            }
        } else {
            echo "<div style='height:750px;'></div>";
        }
        ?>

    </div>


    <!-- COLUMNA SERVICIO PAR -->
    <div id="columnas-div" class="col-sm-3 col-md-3">
        <!-- div -->
        <?php
        $data = select_all_servicio_par($_SESSION["ID_USUARIO"]);

        if ($data->num_rows > 0) {
            // output data of each row
            while ($row = $data->fetch_assoc()) {
                $idServicio = $row['ID_SERVICIO'];
                $imagen1 = select_imagen_servicio(1,$row['ID_SERVICIO']);
                $imagen2 = select_imagen_servicio(2,$row['ID_SERVICIO']);
                $imagen3 = select_imagen_servicio(3,$row['ID_SERVICIO']);
                ?>
                <div>
                    <div onclick="editService(<?php echo $row['ID_SERVICIO'] ?>)" class="thumbnail mostrarServicio">
                        <img style="width: 100%" src="<?php
                        if ($imagen1==$row['ID_usuario'].'_'){
                            if ($imagen2==$row['ID_usuario'].'_'){
                                if ($imagen3==$row['ID_usuario'].'_'){
                                    echo "../../img/pordefecto.png";
                                }else{
                                    echo '../../img/services/'.$row['ID_usuario'].'/'.$imagen3;
                                }
                            }else{
                                echo '../../img/services/'.$row['ID_usuario'].'/'.$imagen2;
                            }
                        }else{
                            echo '../../img/services/'.$row['ID_usuario'].'/'.$imagen1;
                        }

                        ?>"/>
                        <div class="caption">
                            <h1><?php echo $row['nombre']?></h1>
                            <h5><?php echo $row['precio']?>&nbsp;€/h</h5>
                        </div>
                    </div>
                    <!-- Boton eliminar servicio -->
                    <button onclick="enviarIdServicio(<?php echo $idServicio ?>)" id="botonEliminar" role="button" type="button" class="buttonEliminar glyphicon glyphicon-trash"></button>
                </div>
                <?php
            }
        } else {
            echo "<div style='height:750px;'></div>";
        }
        ?>

    </div>

    <!-- COLUMNA SERVICIO IMPAR -->
    <div id="columnas-div" class="col-sm-3 col-md-3">
        <!-- div -->
        <?php
        $data = select_all_servicio_impar($_SESSION["ID_USUARIO"]);

        if ($data->num_rows > 0) {
            // output data of each row
            while ($row = $data->fetch_assoc()) {
                $idServicio = $row['ID_SERVICIO'];
                $imagen1 = select_imagen_servicio(1,$row['ID_SERVICIO']);
                $imagen2 = select_imagen_servicio(2,$row['ID_SERVICIO']);
                $imagen3 = select_imagen_servicio(3,$row['ID_SERVICIO']);
                ?>
                <div>
                    <div onclick="editService(<?php echo $row['ID_SERVICIO'] ?>)" class="thumbnail mostrarServicio">
                        <img style="width: 100%" src="<?php
                        if ($imagen1==$row['ID_usuario'].'_'){
                            if ($imagen2==$row['ID_usuario'].'_'){
                                if ($imagen3==$row['ID_usuario'].'_'){
                                    echo "../../img/pordefecto.png";
                                }else{
                                    echo '../../img/services/'.$row['ID_usuario'].'/'.$imagen3;
                                }
                            }else{
                                echo '../../img/services/'.$row['ID_usuario'].'/'.$imagen2;
                            }
                        }else{
                            echo '../../img/services/'.$row['ID_usuario'].'/'.$imagen1;
                        }

                        ?>"/>
                        <div class="caption">
                            <h1><?php echo $row['nombre']?></h1>
                            <h5><?php echo $row['precio']?>&nbsp;€/h</h5>
                        </div>
                    </div>
                    <!-- Boton eliminar servicio -->
                    <button onclick="enviarIdServicio(<?php echo $idServicio ?>)" id="botonEliminar" role="button" type="button" class="buttonEliminar glyphicon glyphicon-trash"></button>
                </div>
                <?php
            }
        } else {
            echo "<div style='height:750px;'></div>";
        }
        ?>

    </div>
    </div>
    </div>

<!--MODAL Eliminar producto-->
<div id="eliminarProducto" class="modal fade bordeModal">
    <div class="modal-dialog" style="margin-top:10px !important">
        <div class="modal-content">
            <div class="modal-header parteSuperior">
                <h4 class="modal-title">Eliminar producto</h4>
            </div>
            <div class="modal-body parteInferior">
                <form action="../main.php?tipo=venderProducto" method="POST">

                    <div class="form-group" style="float: left; width: 35%; margin-top:-15px; margin-bottom:0px">
                        <div class="thumbnail mostrarProducto sinBordeAbajo">
                            <img style="height: 180px;" src="<?php
                            $imagen1 = select_imagen_producto(1,$_GET['idProducto']);
                            $imagen2 = select_imagen_producto(2,$_GET['idProducto']);
                            $imagen3 = select_imagen_producto(3,$_GET['idProducto']);
                            $imagen4 = select_imagen_producto(4,$_GET['idProducto']);
                            $imagen5 = select_imagen_producto(5,$_GET['idProducto']);
                            if ($imagen1==$_SESSION['ID_USUARIO'].'_'){
                                if ($imagen2==$_SESSION['ID_USUARIO'].'_'){
                                    if ($imagen3==$_SESSION['ID_USUARIO'].'_'){
                                        if ($imagen4==$_SESSION['ID_USUARIO'].'_'){
                                            if ($imagen5==$_SESSION['ID_USUARIO'].'_'){
                                                echo "../../img/pordefecto.png";
                                            }else{
                                                echo '../../img/products/'.$_SESSION['ID_USUARIO'].'/'.$imagen5;
                                            }
                                        }else{
                                            echo '../../img/products/'.$_SESSION['ID_USUARIO'].'/'.$imagen4;
                                        }
                                    }else{
                                        echo '../../img/products/'.$_SESSION['ID_USUARIO'].'/'.$imagen3;
                                    }
                                }else{
                                    echo '../../img/products/'.$_SESSION['ID_USUARIO'].'/'.$imagen2;
                                }
                            }else{
                                echo '../../img/products/'.$_SESSION['ID_USUARIO'].'/'.$imagen1;
                            }

                            ?>"/>
                        </div>
                    </div>

                    <div style="float: left; margin-top:30px; margin-left:-5px; margin-bottom:7px" class="form-group btn btn-danger">
                        <label style="color:black; font-size:20px">Se borraran todos los </label></br>
                        <label style="color:black; font-size:20px">datos del producto, incluido </label></br>
                        <label style="color:black; font-size:20px">los chats sobre el ¿Estas </label></br>
                        <label style="color:black; font-size:20px">seguro que deseas eliminarlo?</label>
                    </div>

                    <input type="hidden" name="variable1" value="<?php echo $_GET['idProducto'] ?>">

                    <div class="form-group">
                        <label>Lo has vendido/intercambiado?&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <label>Si&nbsp;&nbsp;<input id="checkboxVendido" type="checkbox" name="checkboxVendido" class="switcha ui-draggable">
                            <div style="margin-top: 226px; left: 40px; top: 210px;" class="slider rounda ui-draggable"></div>
                            &nbsp;&nbsp;No</label>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function () {
                            var mgift = $('input#checkboxVendido[type=checkbox]');
                            // check for default status (when checked, show the shcompany)
                            if (mgift.attr('checked') !== undefined){
                                $('#vendidosino').hide("linear");
                            } else {
                                $('#vendidosino').show("linear");
                            }

                            // then simply toggle the shcompany on every change
                            mgift.change(function(){
                                $('#vendidosino').toggle(1000);
                            });
                        });
                    </script>

                    <div class="form-group">
                        <label>Escribe tu password para confirmar</label>
                        <input type="password" name="password0" class="form-control" placeholder="Password" required>
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

<!--MODAL Eliminar servicio-->
<div id="eliminarServicio" class="modal fade bordeModal">
    <div class="modal-dialog" style="margin-top:50px !important">
        <div class="modal-content">
            <div class="modal-header parteSuperior">
                <h4 class="modal-title">Eliminar servicio</h4>
            </div>
            <div class="modal-body parteInferior">
                <form action="../main.php?tipo=venderServicio" method="POST">

                    <div class="form-group" style="float: left; width: 35%; max-height: 80px; margin-top:0px; margin-bottom:0px">
                        <div class="thumbnail mostrarServicio sinBordeAbajo">
                            <img style="height: 180px;" src="<?php
                            $imagen1 = select_imagen_servicio(1,$_GET['idServicio']);
                            $imagen2 = select_imagen_servicio(2,$_GET['idServicio']);
                            $imagen3 = select_imagen_servicio(3,$_GET['idServicio']);
                            if ($imagen1==$_SESSION['ID_USUARIO'].'_'){
                                if ($imagen2==$_SESSION['ID_USUARIO'].'_'){
                                    if ($imagen3==$_SESSION['ID_USUARIO'].'_'){
                                         echo "../../img/pordefecto.png";
                                    }else{
                                        echo '../../img/services/'.$_SESSION['ID_USUARIO'].'/'.$imagen3;
                                    }
                                }else{
                                    echo '../../img/services/'.$_SESSION['ID_USUARIO'].'/'.$imagen2;
                                }
                            }else{
                                echo '../../img/services/'.$_SESSION['ID_USUARIO'].'/'.$imagen1;
                            }

                            ?>"/>
                        </div>
                    </div>

                    <div style="float: left; margin-top:10px; margin-left:10px; margin-bottom:117px" class="form-group btn btn-danger">
                        <label style="color:black; font-size:20px">Se borraran todos los </label></br>
                        <label style="color:black; font-size:20px">datos del servicio, incluido </label></br>
                        <label style="color:black; font-size:20px">los chats sobre el ¿Estas </label></br>
                        <label style="color:black; font-size:20px">seguro que deseas eliminarlo?</label>
                    </div>

                    <input type="hidden" name="variable1" value="<?php echo $_GET['idServicio'] ?>">

                    <div class="form-group">
                        <label>Lo has vendido/intercambiado?&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <label>Si&nbsp;&nbsp;<input id="checkboxVendido2" type="checkbox" name="checkboxVendido" class="switcha ui-draggable">
                            <div style="margin-top: 300px; left: 246px; top: 210px;" class="slider rounda ui-draggable"></div>
                            &nbsp;&nbsp;No</label>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function () {
                            var mgift = $('input#checkboxVendido2[type=checkbox]');
                            var shcompany = $('#vendidosino2');
                            // check for default status (when checked, show the shcompany)
                            if (mgift.attr('checked') !== undefined){
                                shcompany.hide("linear");
                            } else {
                                shcompany.show("linear");
                            }

                            // then simply toggle the shcompany on every change
                            mgift.change(function(){
                                shcompany.toggle(1000);
                            });
                        });
                    </script>

                    <div class="form-group">
                        <label>Escribe tu password para confirmar</label>
                        <input type="password" name="password0" class="form-control" placeholder="Password" required>
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

    <?php
    include '../masterPage/masterPageFooter.php';
    ?>

    </body>
</html>
<?php
} else {
    header("location:../index.php");
}
?>