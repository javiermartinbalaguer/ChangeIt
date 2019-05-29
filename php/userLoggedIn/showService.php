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

            <div class="preview col-md-4">

                <?php
                $idUsuario = select_idUsuario_servicio($idServicio);
                $sinImagen=$idUsuario.'_';
                $imagen1 = select_imagen_servicio(1,$idServicio);
                $imagen2 = select_imagen_servicio(2,$idServicio);
                $imagen3 = select_imagen_servicio(3,$idServicio);
                if($imagen1!=$sinImagen){
                    $url1='../../img/services/'.$idUsuario.'/'.$imagen1;
                }else{
                    $url1='../../img/nodisponible.jpg';
                }
                if($imagen2!=$sinImagen){
                    $url2='../../img/services/'.$idUsuario.'/'.$imagen2;
                }else{
                    $url2='../../img/nodisponible.jpg';
                }
                if($imagen3!=$sinImagen){
                    $url3='../../img/services/'.$idUsuario.'/'.$imagen3;
                }else{
                    $url3='../../img/nodisponible.jpg';
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

            <?php
            $data = select_servicio($idServicio);
            if ($data->num_rows > 0) {
            // output data of each row
            while ($row = $data->fetch_assoc()) {
            $_SESSION['ID_USUARIO_SERVICIO'] = $row['ID_usuario'];
            ?>

            <div class="details col-md-8">
                <h3 class="product-title">
                    <?php
                    if ($row['ciudad']==null){
                        echo $row['nombre'];
                    }else{
                        echo $row['nombre']." (".$row['ciudad'].")";
                    }
                    ?>
                </h3>

                <!-- comprovar que no es tu producto -->
                <?php
                    if($_SESSION['ID_USUARIO_SERVICIO']!=$_SESSION['ID_USUARIO']) {
                ?>
                <!-- enviar servicio a favoritos -->
                <form action="" method="POST">
                    <input type="hidden" name="idServicio" value="<?php echo $row['ID_SERVICIO']?>">
                    <button style="background: #eeeeee; margin-left:92%; margin-top: -75px;" class="botonFavorito btn btn-transparent">
                    <span class="corazon glyphicon glyphicon-heart" aria-hidden="true"></span>
                    </button>
                </form>
                <?php
                }
                ?>

                <div class="form-group">
                    <?php $nombreUsuario = select_nombre_usuario($row['ID_usuario']);?>
                    <h3 style="float: left"><?php echo "de: ".$nombreUsuario?></h3>
                    <span onclick="perfilUsuario(<?php echo $row['ID_usuario'] ?>)" class="glyphicon glyphicon-eye-open nombreUsuario" aria-hidden="true"></span>
               </div>

                <p class="product-description"><?php echo $row['descripcion']?></p>
                <h4 class="price">Precio: <span><?php echo $row['precio']?> €/h</span></h4>

                <!-- CHAT -->
                <div>
                    <?php
                    if($_SESSION['ID_USUARIO_SERVICIO']!=$_SESSION['ID_USUARIO']) {
                        ?>
                        <center>
                            <button class="botonAbrirChat">Abrir</br></br>chat</button>
                        </center>
                        <?php
                    }
                    ?>
                </div>


                <?php
                }
                } else {
                    echo "0 results";
                }
                ?>


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