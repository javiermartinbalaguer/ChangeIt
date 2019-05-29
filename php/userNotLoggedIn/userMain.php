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

    <?php
    include '../masterPage/masterPageHeader.php';
    ?>

</head>
<body>

    <?php
    include '../masterPage/masterPageMenuConLogin.php';
    ?>


    <!-- Cabecera
    <img src="../../img/BarteNowBanner.png" class="cabecera">
    -->


    <?php
    include 'selectArticlesConLogin.php';
    ?>
    
    

    <!-- Boton Buscador -->
    <div id="nav-bar-2" class="navbar-fixed-top col-md-12">
        <!--<button type="button" class="buscar btn btn-default btn-sm col-md-2 col-md-offset-5" data-toggle="modal" data-target="#myModal">Buscador   <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>-->
        <form action="" method="POST" name="search_form" id="search_Articles">
            <input type="text" class="form-control buscadorInterno" id="inputBuscar" placeholder="Buscador">
        </form>
        <!-- Boton Buscador -->
        
    </div>


    <?php
    include '/home/u825670329/public_html/BarterNow/php/masterPage/masterPageFooterBotonMas.php';
    ?>

</body>
</html>
<?php
} else {
    header("location:/home/u825670329/public_html/BarterNow/php/index.php");
}
?>