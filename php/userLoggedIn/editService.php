<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include('../functions.php');
?>
<!DOCTYPE html>
<html>
<head>

    <title>Proyecto</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/articuloChat.css">
    <?php
    include '../masterPage/masterPageHeader.php';
    ?>

</head>
<body>

<?php
include '../masterPage/masterPageMenuConLogin.php';
?>

<?php
$idServicio = $_GET['id'];
$_SESSION['ID_servicio'] = $idServicio;
?>

<div class="card">
    <div class="container-fliud">
        <div class="wrapper row">

            <div class="preview col-md-6">

                <?php
                $idUsuario = select_idUsuario_servicio($idServicio);
                $sinImagen=$idUsuario.'_';
                $imagen1 = select_imagen_servicio(1,$idServicio);
                $imagen2 = select_imagen_servicio(2,$idServicio);
                $imagen3 = select_imagen_servicio(3,$idServicio);
                if($imagen1!=$sinImagen){
                    $url1='../../img/services/'.$idUsuario.'/'.$imagen1;
                }else{
                    $url1='../../img/pordefecto.jpg';
                }
                if($imagen2!=$sinImagen){
                    $url2='../../img/services/'.$idUsuario.'/'.$imagen2;
                }else{
                    $url2='../../img/pordefecto.jpg';
                }
                if($imagen3!=$sinImagen){
                    $url3='../../img/services/'.$idUsuario.'/'.$imagen3;
                }else{
                    $url3='../../img/pordefecto.jpg';
                }
                ?>

                <div class="preview-pic tab-content">
                    <div class="tab-pane active bordeImagenArticulo" id="pic-1"><img src="<?php echo $url1 ?>"/></div>
                    <div class="tab-pane bordeImagenArticulo" id="pic-2"><img src="<?php echo $url2 ?>" /></div>
                    <div class="tab-pane bordeImagenArticulo" id="pic-3"><img src="<?php echo $url3 ?>" /></div>
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
                    <li class="active bordeImagenArticulo"><a data-target="#pic-1" data-toggle="tab"><img src="<?php echo $url1 ?>" /></a></li>
                    <li class="bordeImagenArticulo"><a data-target="#pic-2" data-toggle="tab"><img src="<?php echo $url2 ?>" /></a></li>
                    <li class="bordeImagenArticulo"><a data-target="#pic-3" data-toggle="tab"><img src="<?php echo $url3 ?>" /></a></li>
                </ul>

            </div>

            <div class="details col-md-6">
                <center>
                    <form action="../main.php?tipo=modificarServicio" method="post" enctype="multipart/form-data">
                        <?php
                        $data = select_servicio($idServicio);

                        if ($data->num_rows > 0) {
                            // output data of each row
                            while ($row = $data->fetch_assoc()) {
                                $_SESSION['ID_servicio']=$row['ID_SERVICIO'];
                                ?>
                                <div class="col-md-9" style="margin-top:10px;">
                                    <div class="form-group">
                                        <label for="exampleInputNombre">Nombre</label>
                                        <input style="color:white" type="text" name="nombre" class="form-control" value="<?php echo $row['nombre']?>" required>
                                    </div>
                                </div>
                                <div class="col-md-3" style="margin-top:10px;">
                                    <div class="form-group">
                                        <label for="exampleInputPrecio">Precio €</label>
                                        <input style="color:white" type="number" name="precio" class="form-control" value="<?php echo $row['precio'];?>" required>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top:10px;">
                                    <div class="form-group">
                                        <label for="exampleInputDescripcion">Descripcion</label>
                                        <textarea style="color:white;" name="descripcion" rows="12" class="form-control" required><?php echo $row['descripcion'];?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-top:10px;">
                                    <div class="form-group">
                                        <label for="exampleInputNombre">Ciudad</label>
                                        <select name="ciudad" class="select_box semi-square">
                                            <option value="<?php echo $row['ciudad'] ?>"><?php echo $row['ciudad'] ?></option>
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
                                </div>


                                <div class="col-md-6" style="margin-top:10px;">
                                    <div class="form-group">
                                        <label for="exampleInputTema">Selecciona el tema</label></br>
                                        <?php $data = select_all_tema_servicio(); ?>
                                        <select name="tema" class="select_box semi-square" required>
                                            <?php $tema = select_nombre_tema_servicio($row['tema']) ?>
                                            <option value="<?php echo $row['tema'] ?>"><?php echo $tema ?></option>
                                            <?php
                                            if ($data->num_rows > 0) {
                                                // output data of each row
                                                while($row = $data->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row['ID_CAT_SERV']?>"><?php echo $row['tema'];?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary botonModificarArticulo" Value="Modificar" >Modificar</button>
                        </div>
                        </br>
                    </form>

                    <form action="../main.php?tipo=eliminarServicio" method="post" enctype="multipart/form-data">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger botonEliminarArticulo" Value="Eliminar" >Eliminar</button>
                        </div>
                    </form>

                </center>
            </div>


        </div>


    </div>

</div>
</div>
</div>


<?php
include '../masterPage/masterPageFooter.php';
?>

</body>
</html>


<style>

    /*****************globals*************/
    body {
        overflow-x: hidden;
        /*padding-left:10%;
        padding-right:10%;*/
    }

    img {
        max-width: 100%; }

    .preview {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column; }
    @media screen and (max-width: 996px) {
        .preview {
            margin-bottom: 20px; } }

    .preview-pic {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1; }

    .preview-thumbnail.nav-tabs {
        border: none;
        margin-top: 15px; }
    .preview-thumbnail.nav-tabs li {
        width: 18%;
        margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
        max-width: 100%;
        display: block; }
    .preview-thumbnail.nav-tabs li a {
        padding: 0;
        margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
        margin-right: 0; }

    .tab-content {
        overflow: hidden; }
    .tab-content img {
        width: 100%;
        -webkit-animation-name: opacity;
        animation-name: opacity;
        -webkit-animation-duration: .3s;
        animation-duration: .3s; }

    .card {
        margin-top: 50px;
        background: #eee;
        padding: 3em;
        line-height: 1.5em;
        width:90%;
        border-radius:;
        margin:50px auto 0px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
    }

    @media screen and (min-width: 997px) {
        .wrapper {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex; } }

    .details {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column; }

    .colors {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1; }

    .product-title, .price, .sizes, .colors {
        text-transform: UPPERCASE;
        font-weight: bold; }

    .checked, .price span {
        color: #ff9f1a; }

    .product-title, .rating, .product-description, .price, .vote, .sizes {
        margin-bottom: 15px; }

    .product-title {
        margin-top: 0; }

    .size {
        margin-right: 10px; }
    .size:first-of-type {
        margin-left: 40px; }

    .color {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        height: 2em;
        width: 2em;
        border-radius: 2px; }
    .color:first-of-type {
        margin-left: 20px; }

    .add-to-cart, .like {
        background: #ff9f1a;
        padding: 1.2em 1.5em;
        border: none;
        text-transform: UPPERCASE;
        font-weight: bold;
        color: #fff;
        -webkit-transition: background .3s ease;
        transition: background .3s ease; }
    .add-to-cart:hover, .like:hover {
        background: #b36800;
        color: #fff; }

    .not-available {
        text-align: center;
        line-height: 2em; }
    .not-available:before {
        font-family: fontawesome;
        content: "\f00d";
        color: #fff; }

    .orange {
        background: #ff9f1a; }

    .green {
        background: #85ad00; }

    .blue {
        background: #0076ad; }

    .tooltip-inner {
        padding: 1.3em; }

    @-webkit-keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3); }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1); } }

    @keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3); }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1); } }

    /*# sourceMappingURL=style.css.map */
</style>