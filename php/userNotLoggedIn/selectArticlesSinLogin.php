
<center>
    <!-- BOTONES PARA ORDENAR PRODUCTOS -->
    <div class="panelbotones1 btn-group btn-group-justified" style="margin-top: 30px;" role="group">

        <div class="fila2 btn-group btn-group-justified" role="group">
            <form id="NombreProductoDesc" class="btn-group" role="group" action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="comoOrdenarProducto" value="NombreProductoAsc"/>
                <button id="nombreProducto" class="btn btn-primary btn-sm">
                    Nombre <span id="spannombreProducto" class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
                </button>
            </form>
            <form id="NombreProductoAsc" class="btn-group" role="group" action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="comoOrdenarProducto" value="NombreProductoDesc"/>
                <button id="nombreProducto" class="btn btn-primary btn-sm">
                    Nombre <span id="spannombreProducto" class="glyphicon glyphicon-sort-by-alphabet"></span>
                </button>
            </form>
            <form id="PrecioProductoDesc" class="btn-group" role="group" action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="comoOrdenarProducto" value="PrecioProductoAsc"/>
                <button id="precioProducto" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-euro"></span>
                    <span id="spanprecioProducto" class="glyphicon glyphicon-arrow-up"></span>
                </button>
            </form>
            <form id="PrecioProductoAsc" class="btn-group" role="group" action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="comoOrdenarProducto" value="PrecioProductoDesc"/>
                <button id="precioProducto" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-euro"></span>
                    <span id="spanprecioProducto" class="glyphicon glyphicon-arrow-down"></span>
                </button>
            </form>
            <form id="FechaProductoDesc" class="btn-group" role="group" action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="comoOrdenarProducto" value="FechaProductoAsc"/>
                <button id="fechaProducto" class="btn btn-primary btn-sm">
                    Nuevos <span id="spanfechaProducto" class="glyphicon glyphicon-time"></span>
                </button>
            </form>
            <form id="FechaProductoAsc" class="btn-group" role="group" action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="comoOrdenarProducto" value="FechaProductoDesc"/>
                <button id="fechaProducto" class="btn btn-primary btn-sm">
                    Antiguos <span id="spanfechaProducto" class="glyphicon glyphicon-time"></span>
                </button>
            </form>
        </div>

    </div>
    <?php
    $comoOrdenar = $_POST['comoOrdenarProducto'];
    if($comoOrdenar!=null){
        $_SESSION['comoOrdenarProducto'] = $comoOrdenar;
    }

    switch($_SESSION['comoOrdenarProducto']){
    case "PrecioProductoAsc":
        ?>
        <script>
            document.getElementById('PrecioProductoDesc').style.display = "none";
            document.getElementById('PrecioProductoAsc').style.display = "";
            document.getElementById('NombreProductoDesc').style.display = "none";
            document.getElementById('NombreProductoAsc').style.display = "";
            document.getElementById('FechaProductoDesc').style.display = "none";
            document.getElementById('FechaProductoAsc').style.display = "";
        </script>
    <?php
    break;
    case "PrecioProductoDesc":
    ?>
        <script>
            document.getElementById('PrecioProductoDesc').style.display = "";
            document.getElementById('PrecioProductoAsc').style.display = "none";
            document.getElementById('NombreProductoDesc').style.display = "none";
            document.getElementById('NombreProductoAsc').style.display = "";
            document.getElementById('FechaProductoDesc').style.display = "none";
            document.getElementById('FechaProductoAsc').style.display = "";
        </script>
    <?php
    break;
    case "NombreProductoAsc":
    ?>
        <script>
            document.getElementById('NombreProductoDesc').style.display = "none";
            document.getElementById('NombreProductoAsc').style.display = "";
            document.getElementById('PrecioProductoDesc').style.display = "none";
            document.getElementById('PrecioProductoAsc').style.display = "";
            document.getElementById('FechaProductoDesc').style.display = "none";
            document.getElementById('FechaProductoAsc').style.display = "";
        </script>
    <?php
    break;
    case "NombreProductoDesc":
    ?>
        <script>
            document.getElementById('NombreProductoDesc').style.display = "";
            document.getElementById('NombreProductoAsc').style.display = "none";
            document.getElementById('PrecioProductoDesc').style.display = "none";
            document.getElementById('PrecioProductoAsc').style.display = "";
            document.getElementById('FechaProductoDesc').style.display = "none";
            document.getElementById('FechaProductoAsc').style.display = "";
        </script>
    <?php
    break;
    case "FechaProductoAsc":
    ?>
        <script>
            document.getElementById('FechaProductoDesc').style.display = "none";
            document.getElementById('FechaProductoAsc').style.display = "";
            document.getElementById('PrecioProductoDesc').style.display = "none";
            document.getElementById('PrecioProductoAsc').style.display = "";
            document.getElementById('NombreProductoDesc').style.display = "none";
            document.getElementById('NombreProductoAsc').style.display = "";
        </script>
    <?php
    break;
    case "FechaProductoDesc":
    ?>
        <script>
            document.getElementById('FechaProductoDesc').style.display = "";
            document.getElementById('FechaProductoAsc').style.display = "none";
            document.getElementById('PrecioProductoDesc').style.display = "none";
            document.getElementById('PrecioProductoAsc').style.display = "";
            document.getElementById('NombreProductoDesc').style.display = "none";
            document.getElementById('NombreProductoAsc').style.display = "";
        </script>
    <?php
    break;
    default:
    ?>
        <script>
            document.getElementById('PrecioProductoDesc').style.display = "none";
            document.getElementById('PrecioProductoAsc').style.display = "";
            document.getElementById('NombreProductoDesc').style.display = "none";
            document.getElementById('NombreProductoAsc').style.display = "";
            document.getElementById('FechaProductoDesc').style.display = "none";
            document.getElementById('FechaProductoAsc').style.display = "";
        </script>
        <?php
    }

    ?>

    </div>

    <div class="panelbotones2 btn-group btn-group-justified" style="margin-top: 5px; background: #005175" role="group">
        <div class="btn-group" role="group">
            <button type="button" role="group" class="btn btn-primary btn-group dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Precio
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu"  role="group" class="btn-group" style="padding: 10px;width: 100%;margin-top: -11px;background: #ffffff !important;border-radius: 0px;">
                <li><div id="precioMaxMinProducto">
                        <form action="index.php" method="post" enctype="multipart/form-data">
                            <input oninput="precioOutputName.value = precioMinProducto.value" id="precioMinProducto" name="precioMinProducto" value="0" type="range" min="0" max="2000" class="rangePrecio" style="margin-top: 5%;"/>
                            Min: <output name="precioOutputName" id="precioOutputId">0</output>
                            <input oninput="precioOutputName2.value = precioMaxProducto.value" id="precioMaxProducto" name="precioMaxProducto" value="2000" type="range" min="0" max="2000" class="rangePrecio" style="margin-top: 5%;"/>
                            Max: <output name="precioOutputName2" id="precioOutputId2">2000</output>
                            <input type="hidden" name="comoOrdenarProducto" value="PrecioProducto"/>
                            <button type="submit" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </form>
                    </div></li>
            </ul>
        </div>
    </div>

    </div>



</center>

<style>

    center{
        width:80%;
        height:50px;
        margin:30px auto 30px;
    }
</style>

<div id="galeria" style="margin-bottom:50px; margin-top: 30px;" class="mostrarGaleria">
    <div id="row">
        <div id="resultadoBusqueda">

        </div>

        <div id="contenerdorArticulos">

            <!-- COLUMNA PRODUCTO PAR -->
            <div id="columnas-div" class="col-sm-3 col-md-3">
                <!-- div -->
                <?php
                $cargarMasArticulos = $_POST['cargarMasArticulos'];

                if($cargarMasArticulos!=null AND $_SESSION['cantidadCargarArticulosProductosPar']!=null){
                    $_SESSION['cantidadCargarArticulosProductosPar'] = $_SESSION['cantidadCargarArticulosProductosPar'] + $cargarMasArticulos;
                }else{
                    if ($_SESSION['cantidadCargarArticulosProductosPar']==null){
                        $_SESSION['cantidadCargarArticulosProductosPar'] = 3;
                    }
                }

                //echo $_SESSION['cantidadCargarArticulosProductosPar'];
                switch($_SESSION['comoOrdenarProducto']){
                    case "PrecioProducto":
                        $maximo = $_POST['precioMaxProducto'];
                        $minimo = $_POST['precioMinProducto'];
                        $data = select_price_products_par($minimo,$maximo,'precioAsc',$_SESSION['cantidadCargarArticulosProductosPar']);
                        break;
                    case "PrecioProductoAsc":
                        $data = select_products_par('precioAsc',$_SESSION['cantidadCargarArticulosProductosPar']);
                        break;
                    case "PrecioProductoDesc":
                        $data = select_products_par('precioDesc',$_SESSION['cantidadCargarArticulosProductosPar']);
                        break;
                    case "FechaProductoAsc":
                        $data = select_products_par('fechaAsc',$_SESSION['cantidadCargarArticulosProductosPar']);
                        break;
                    case "FechaProductoDesc":
                        $data = select_products_par('fechaDesc',$_SESSION['cantidadCargarArticulosProductosPar']);
                        break;
                    case "NombreProductoAsc":
                        $data = select_products_par('nombreAsc',$_SESSION['cantidadCargarArticulosProductosPar']);
                        break;
                    case "NombreProductoDesc":
                        $data = select_products_par('nombreDesc',$_SESSION['cantidadCargarArticulosProductosPar']);
                        break;
                    default:
                        $data = select_products_par('fechaDesc',$_SESSION['cantidadCargarArticulosProductosPar']);
                }

                if ($data->num_rows > 0) {
                    // output data of each row
                    while ($row = $data->fetch_assoc()) {
                        $pkPr= $row['ID_PRODUCTO'];
                        $imagen1 = select_imagen_producto(1,$row['ID_PRODUCTO']);
                        $imagen2 = select_imagen_producto(2,$row['ID_PRODUCTO']);
                        $imagen3 = select_imagen_producto(3,$row['ID_PRODUCTO']);
                        $imagen4 = select_imagen_producto(4,$row['ID_PRODUCTO']);
                        $imagen5 = select_imagen_producto(5,$row['ID_PRODUCTO']);
                        ?>
                        <div>
                            <div onclick="showProductIndex(<?php echo $row['ID_PRODUCTO'] ?>)" class="thumbnail mostrarProducto">
                                <img style="width: 100%" src="<?php
                                if ($imagen1==$row['ID_usuario'].'_'){
                                    if ($imagen2==$row['ID_usuario'].'_'){
                                        if ($imagen3==$row['ID_usuario'].'_'){
                                            if ($imagen4==$row['ID_usuario'].'_'){
                                                if ($imagen5==$row['ID_usuario'].'_'){
                                                    echo "../img/pordefecto.png";
                                                }else{
                                                    echo '../img/products/'.$row['ID_usuario'].'/'.$imagen5;
                                                }
                                            }else{
                                                echo '../img/products/'.$row['ID_usuario'].'/'.$imagen4;
                                            }
                                        }else{
                                            echo '../img/products/'.$row['ID_usuario'].'/'.$imagen3;
                                        }
                                    }else{
                                        echo '../img/products/'.$row['ID_usuario'].'/'.$imagen2;
                                    }
                                }else{
                                    echo '../img/products/'.$row['ID_usuario'].'/'.$imagen1;
                                }

                                ?>"/>
                                <div class="caption">
                                    <h3><?php echo $row['nombre']?></h3>
                                    <h5><?php echo $row['precio']?>&nbsp;€</h5>
                                    <p><?php echo $row['ciudad']?></p>
                                </div>
                            </div>
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

                if(($cargarMasArticulos!=null) AND ($_SESSION['cantidadCargarArticulosProductosImpar']!=null)){
                    $_SESSION['cantidadCargarArticulosProductosImpar'] = $_SESSION['cantidadCargarArticulosProductosImpar'] + $cargarMasArticulos;
                }else{
                    if ($_SESSION['cantidadCargarArticulosProductosImpar']==null){
                        $_SESSION['cantidadCargarArticulosProductosImpar'] = 3;
                    }
                }

                //echo $_SESSION['cantidadCargarArticulosProductosImpar'];
                switch($_SESSION['comoOrdenarProducto']){
                    case "PrecioProducto":
                        $maximo = $_POST['precioMaxProducto'];
                        $minimo = $_POST['precioMinProducto'];
                        $data = select_price_products_impar($minimo,$maximo,'precioAsc',$_SESSION['cantidadCargarArticulosProductosImpar']);
                        break;
                    case "PrecioProductoAsc":
                        $data = select_products_impar('precioAsc',$_SESSION['cantidadCargarArticulosProductosImpar']);
                        break;
                    case "PrecioProductoDesc":
                        $data = select_products_impar('precioDesc',$_SESSION['cantidadCargarArticulosProductosImpar']);
                        break;
                    case "FechaProductoAsc":
                        $data = select_products_impar('fechaAsc',$_SESSION['cantidadCargarArticulosProductosImpar']);
                        break;
                    case "FechaProductoDesc":
                        $data = select_products_impar('fechaDesc',$_SESSION['cantidadCargarArticulosProductosImpar']);
                        break;
                    case "NombreProductoAsc":
                        $data = select_products_impar('nombreAsc',$_SESSION['cantidadCargarArticulosProductosImpar']);
                        break;
                    case "NombreProductoDesc":
                        $data = select_products_impar('nombreDesc',$_SESSION['cantidadCargarArticulosProductosImpar']);
                        break;
                    default:
                        $data = select_products_impar('fechaDesc',$_SESSION['cantidadCargarArticulosProductosImpar']);
                }

                if ($data->num_rows > 0) {
                    // output data of each row
                    while ($row = $data->fetch_assoc()) {
                        $pkPr= $row['ID_PRODUCTO'];
                        $imagen1 = select_imagen_producto(1,$row['ID_PRODUCTO']);
                        $imagen2 = select_imagen_producto(2,$row['ID_PRODUCTO']);
                        $imagen3 = select_imagen_producto(3,$row['ID_PRODUCTO']);
                        $imagen4 = select_imagen_producto(4,$row['ID_PRODUCTO']);
                        $imagen5 = select_imagen_producto(5,$row['ID_PRODUCTO']);
                        ?>
                        <div>
                            <div onclick="showProductIndex(<?php echo $row['ID_PRODUCTO'] ?>)" class="thumbnail mostrarProducto">
                                <img style="width: 100%" src="<?php
                                if ($imagen1==$row['ID_usuario'].'_'){
                                    if ($imagen2==$row['ID_usuario'].'_'){
                                        if ($imagen3==$row['ID_usuario'].'_'){
                                            if ($imagen4==$row['ID_usuario'].'_'){
                                                if ($imagen5==$row['ID_usuario'].'_'){
                                                    echo "../img/pordefecto.png";
                                                }else{
                                                    echo '../img/products/'.$row['ID_usuario'].'/'.$imagen5;
                                                }
                                            }else{
                                                echo '../img/products/'.$row['ID_usuario'].'/'.$imagen4;
                                            }
                                        }else{
                                            echo '../img/products/'.$row['ID_usuario'].'/'.$imagen3;
                                        }
                                    }else{
                                        echo '../img/products/'.$row['ID_usuario'].'/'.$imagen2;
                                    }
                                }else{
                                    echo '../img/products/'.$row['ID_usuario'].'/'.$imagen1;
                                }

                                ?>"/>
                                <div class="caption">
                                    <h3><?php echo $row['nombre']?></h3>
                                    <h5><?php echo $row['precio']?>&nbsp;€</h5>
                                    <p><?php echo $row['ciudad']?></p>

                                </div>
                            </div>

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

                if(($cargarMasArticulos!=null) AND ($_SESSION['cantidadCargarArticulosServicioPar']!=null)){
                    $_SESSION['cantidadCargarArticulosServicioPar'] = $_SESSION['cantidadCargarArticulosServicioPar'] + $cargarMasArticulos;
                }else{
                    if ($_SESSION['cantidadCargarArticulosServicioPar']==null){
                        $_SESSION['cantidadCargarArticulosServicioPar'] = 3;
                    }
                }
                //echo $_SESSION['cantidadCargarArticulosServicioPar'];
                switch($_SESSION['comoOrdenarProducto']){
                    case "PrecioProducto":
                        $maximo = $_POST['precioMaxProducto'];
                        $minimo = $_POST['precioMinProducto'];
                        $data = select_price_services_par($minimo,$maximo,'precioAsc',$_SESSION['cantidadCargarArticulosServicioPar']);
                        break;
                    case "PrecioProductoAsc":
                        $data = select_services_par('precioAsc',$_SESSION['cantidadCargarArticulosServicioPar']);
                        break;
                    case "PrecioProductoDesc":
                        $data = select_services_par('precioDesc',$_SESSION['cantidadCargarArticulosServicioPar']);
                        break;
                    case "FechaProductoAsc":
                        $data = select_services_par('fechaAsc',$_SESSION['cantidadCargarArticulosServicioPar']);
                        break;
                    case "FechaProductoDesc":
                        $data = select_services_par('fechaDesc',$_SESSION['cantidadCargarArticulosServicioPar']);
                        break;
                    case "NombreProductoAsc":
                        $data = select_services_par('nombreAsc',$_SESSION['cantidadCargarArticulosServicioPar']);
                        break;
                    case "NombreProductoDesc":
                        $data = select_services_par('nombreDesc',$_SESSION['cantidadCargarArticulosServicioPar']);
                        break;
                    default:
                        $data = select_services_par('fechaDesc',$_SESSION['cantidadCargarArticulosServicioPar']);
                }


                if ($data->num_rows > 0) {
                    // output data of each row
                    while ($row = $data->fetch_assoc()) {
                        $pk = $row['ID_SERVICIO'];
                        $imagen1 = select_imagen_servicio(1,$row['ID_SERVICIO']);
                        $imagen2 = select_imagen_servicio(2,$row['ID_SERVICIO']);
                        $imagen3 = select_imagen_servicio(3,$row['ID_SERVICIO']);
                        ?>
                        <div>
                            <div onclick="showServiceIndex(<?php echo $row['ID_SERVICIO'] ?>)" class="thumbnail mostrarServicio">
                                <img style="width: 100%" src="<?php
                                if ($imagen1==$row['ID_usuario'].'_'){
                                    if ($imagen2==$row['ID_usuario'].'_'){
                                        if ($imagen3==$row['ID_usuario'].'_'){
                                            echo "../img/pordefecto.png";
                                        }else{
                                            echo '../img/services/'.$row['ID_usuario'].'/'.$imagen3;
                                        }
                                    }else{
                                        echo '../img/services/'.$row['ID_usuario'].'/'.$imagen2;
                                    }
                                }else{
                                    echo '../img/services/'.$row['ID_usuario'].'/'.$imagen1;
                                }

                                ?>"/>
                                <div class="caption">
                                    <h3><?php echo $row['nombre']?></h3>
                                    <h5><?php echo $row['precio']?>&nbsp;€/h</h5>
                                    <p><?php echo $row['ciudad']?></p>

                                </div>
                            </div>

                            <div id="infoFav"> </div>
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
                $cargarMasArticulos = $_POST['cargarMasArticulos'];

                if(($cargarMasArticulos!=null) AND ($_SESSION['cantidadCargarArticulosServicioImpar']!=null)){
                    $_SESSION['cantidadCargarArticulosServicioImpar'] = $_SESSION['cantidadCargarArticulosServicioImpar'] + $cargarMasArticulos;
                }else{
                    if ($_SESSION['cantidadCargarArticulosServicioImpar']==null){
                        $_SESSION['cantidadCargarArticulosServicioImpar'] = 3;
                    }
                }
                //echo $_SESSION['cantidadCargarArticulosServicioImpar'];
                switch($_SESSION['comoOrdenarProducto']){
                    case "PrecioProducto":
                        $maximo = $_POST['precioMaxProducto'];
                        $minimo = $_POST['precioMinProducto'];
                        $data = select_price_services_impar($minimo,$maximo,'precioAsc',$_SESSION['cantidadCargarArticulosServicioImpar']);
                        break;
                    case "PrecioProductoAsc":
                        $data = select_services_impar('precioAsc',$_SESSION['cantidadCargarArticulosServicioImpar']);
                        break;
                    case "PrecioProductoDesc":
                        $data = select_services_impar('precioDesc',$_SESSION['cantidadCargarArticulosServicioImpar']);
                        break;
                    case "FechaProductoAsc":
                        $data = select_services_impar('fechaAsc',$_SESSION['cantidadCargarArticulosServicioImpar']);
                        break;
                    case "FechaProductoDesc":
                        $data = select_services_impar('fechaDesc',$_SESSION['cantidadCargarArticulosServicioImpar']);
                        break;
                    case "NombreProductoAsc":
                        $data = select_services_impar('nombreAsc',$_SESSION['cantidadCargarArticulosServicioImpar']);
                        break;
                    case "NombreProductoDesc":
                        $data = select_services_impar('nombreDesc',$_SESSION['cantidadCargarArticulosServicioImpar']);
                        break;
                    default:
                        $data = select_services_impar('fechaDesc',$_SESSION['cantidadCargarArticulosServicioImpar']);
                }

                if ($data->num_rows > 0) {
                    // output data of each row
                    while ($row = $data->fetch_assoc()) {
                        $id_servicio = $row['ID_SERVICIO'];
                        $imagen1 = select_imagen_servicio(1,$row['ID_SERVICIO']);
                        $imagen2 = select_imagen_servicio(2,$row['ID_SERVICIO']);
                        $imagen3 = select_imagen_servicio(3,$row['ID_SERVICIO']);
                        ?>
                        <div>
                            <div onclick="showServiceIndex(<?php echo $row['ID_SERVICIO'] ?>)" class="thumbnail mostrarServicio">
                                <img style="width: 100%" src="
                                                      <?php
                                if ($imagen1==$row['ID_usuario'].'_'){
                                    if ($imagen2==$row['ID_usuario'].'_'){
                                        if ($imagen3==$row['ID_usuario'].'_'){
                                            echo "../img/pordefecto.png";
                                        }else{
                                            echo '../img/services/'.$row['ID_usuario'].'/'.$imagen3;
                                        }
                                    }else{
                                        echo '../img/services/'.$row['ID_usuario'].'/'.$imagen2;
                                    }
                                }else{
                                    echo '../img/services/'.$row['ID_usuario'].'/'.$imagen1;
                                }

                                ?>"/>
                                <div class="caption">
                                    <h3><?php echo $row['nombre']?></h3>
                                    <h5><?php echo $row['precio']?>&nbsp;€/h</h5>
                                    <p><?php echo $row['ciudad']?></p>
                                </div>
                            </div>
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
</div>


<!-- Modal de notificaciones-->
<div class="modal fade" id="mostarNotificaciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Hola <?php echo $_SESSION['nombre']?>, encontramos artículos que te pueden interesar</h4>
            </div>
            <div class="modal-body" id="etiquetasBuscador">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="mostarArticulosDeInteres()">Ver Artículos</button>
            </div>
        </div>
    </div>
</div>


<!--Botón oculto para mostrar las notificaciones  -->
<button type="button" id="btnModalNotificaciones" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mostarNotificaciones" style="display: none">
</button>

<script>

    function mostarArticulosDeInteres(){
        $.ajax({
            type: "POST",
            url:"../metodos/mostrarBusqueda.php",
        }).done(function(info)
        {
            var resultBuscardor = info.trim();

            if(resultBuscardor.length > 0 )
            {
                $('#contenerdorArticulos').hide();
                $("#resultadoBusqueda").html(info);

            }
        })
    }

    $(document).ready(function() {
        $.ajaxSetup({"cache":false});
        buscarNotificaciones();
        setInterval("buscarNotificaciones()",
            20000);

    });

    var  buscarNotificaciones = function(){


        $.ajax({
            type: "POST",
            url:"../metodos/buscarPalabra.php",
        }).done(function(info)
        {
            var resultBuscardor = info.trim();

            if(resultBuscardor.length > 0 )
            {
                $("#btnModalNotificaciones").click();
                $("#etiquetasBuscador").html(info);

            }
        })

    }



</script>


