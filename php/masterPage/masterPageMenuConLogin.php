<!-- Barra de navegacio -->
<nav class="navbar navbar-default navbar-fixed-top" style="z-index:1031">
    <div class="container-fluid">
        <!-- Logo -->
        <div class="navbar-header">
            <!-- Boton reduccion NO ELIMINAR -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a id="barraNavBar" class="navbar-brand" href="userMain.php">
                <div style="margin-left:5%; margin-top:3.5%" id="logo">Inicio</div>
            </a>
        </div>
        <div class="collapse navbar-collapse" style="width: 100%;" id="bs-example-navbar-collapse-1">
            <!-- Registro y Login -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Registro -->
                <!-- Login -->
                <li class="dropdown">
                    <a class="dropdown-toggle dropdownNombre" style="padding: 0px 0px 0px 75px;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["nombre"]; ?>
                        <img style="width:50px;height:50px;margin-left:10px" class="logo" alt="Brand" src="<?php
                        if ($_SESSION["imagen"]==null){
                            echo "../../img/sinImagenPerfil.jpg";
                        }else{
                            echo '../../img/user_logo/'.$_SESSION["ID_USUARIO"].'/'.$_SESSION["imagen"];
                        }

                        ?>"/>
                    </a>
                    <ul class="dropdown-menu" style="padding:8px;">
                        <li><a href="profile.php?idProducto=0&idServicio=0"><span class="glyphicon glyphicon-gift"></span>&nbsp;&nbsp;&nbsp;Mis productos</a></li>
                        <li><a href="editProfile.php"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;&nbsp;Perfil</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../main.php?tipo=desconectar"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;&nbsp;Log out</a></li>
                        <!--<li><a class="btn btn-danger" onclick="borrar_usuario()">Eliminar cuenta</a></li>-->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
