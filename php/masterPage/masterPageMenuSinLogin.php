
<!-- Barra de navegacio -->
<nav class="navbar navbar-default navbar-fixed-top" style="z-index:1031">
    <div class="container-fluid">
        <!-- Logo -->
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a id="barraNavBar" class="navbar-brand" href="../index.php">
                <div style="margin-left:5%; margin-top:3.5%" id="logo">Inicio</div>
            </a>
        </div>
        <div class="collapse navbar-collapse" style="width: 100%;" id="bs-example-navbar-collapse-1">
            <!-- Registro y Login -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Registro -->
                <li><a data-toggle="modal" data-target="#register" data-title="Registro" role="button">Regístrate</a></li>
                <!-- Login -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
                    <form class="dropdown-menu" action="../main.php?tipo=login" method="POST" style="padding:8px;" >

                        <input style="margin-bottom:5px; background:white;" type="email" name="correo" id="correo" class="form-control" placeholder="Correo*" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                        <input style="background:white;" id="pass" type="password" class="form-control" name="contrasenya" placeholder="Password*"/>
                        <button type="submit" class="btn btn-primary form-control" style="margin-top:10px;" Value="login">Sign In</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
//include '../userNotLoggedIn/selectArticlesSinLogin.php';
?>

<!-- Boton Buscador -->
<div id="nav-bar-2" class="navbar-fixed-top col-md-12">
    <!--<button type="button" class="buscar btn btn-default btn-sm col-md-2 col-md-offset-5" data-toggle="modal" data-target="#myModal">Buscador   <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>-->
    <form action="" method="POST" name="search_form" id="search_form">
        <input type="text" class="form-control buscadorSinLogin" id="inputBuscar" name="inputBuscar" placeholder="Buscador">
    </form>
</div>


<!--Register-->
<div id="register" class="modal fade">
    <div class="modal-dialog" style="margin-top:50px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registro</h4>
                </div>
            <div class="modal-body">
                <form id="formRegistro" action="../main.php?tipo=registro" method="POST">
                    <div class="form-group">
                        <label for="exampleInputName">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" style="background:white;" placeholder="Nombre*">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputSurname">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control" style="background:white;" placeholder="Apellidos*">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo</label>
                        <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo*" style="background:white;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña*" style="margin-bottom:5px; background:white;">
                        <input type="password" name="contrasenya" id="contrasenya" class="form-control"  placeholder="Repite la contraseña*" style="margin-bottom:5px; background:white;">
                        <div id="barraEasy"></div>
                        <label id="labelPass" style="font-size:11px;display:none;font-weight:normal;">La contraseña debe tener como mínimo 8 carácteres, y un carácter numérico como mínimo.</label>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="enviar" Value="Registrarse" disabled>Enviar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Boton MASv -->
    <!--
    <div style="width:100%; margin:20px auto;">
            <form action="userMain.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="cargarMasArticulos" value="1"/>
                    <button id="botonCargarArticulos" class="btn btn-def col-md-2 col-md-offset-5" href="#" role="button">Más <span class="glyphicon glyphicon-menu-down"></span></button>
            </form>
    </div>

-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">

    $("document").ready(function(){

        //Your code here
        $('input').keyup(function(){

            //Si los inputs no estan vacíos //Y las contrasenyas son iguales
            if(($('#nombre').val() != "") && ($('#apellidos').val() != "") && ($('#correo').val() != "") && ($('#exampleInputPassword1').val() != "") && ($('#contrasenya').val() != "") && ($('#exampleInputPassword1').val() == $('#contrasenya').val()) &&(comprobarPassword($(this).val())>0 )){

                //quitamos el disabled al boton enviar
                $("#enviar").removeAttr( "disabled" );
            } else {
                $("#enviar").attr( "disabled", true );
            }
        });

        /*
            nombre = $('#nombre').val();
            apellidos = $('#apellidos').val();
            correo = $('#correo').val();
            pass = $('#exampleInputPassword1').val();
            repass = $('#contrasenya').val();
*/
        //$("document").ready(function(){

        //focushecho = 0;
        $('#exampleInputPassword1').focus(function(){

            $('#barraEasy').slideDown();

            //setInterval(function(){

            $(this).keyup(function(){

                if($(this).val().length < 6){
                    $('#barraEasy').css({
                        "background-color": "red",
                        "width": "25%",
                        "height": "7px",
                        "border-radius": "5px",
                    });
                    //$('#barraEasy').text("Fácil");
                } else if ($(this).val().length < 8) {
                    $('#barraEasy').css({
                        "background-color": "yellow",
                        "width": "50%",
                        "height": "7px",
                        "border-radius": "5px",
                    });
                } else if (($(this).val().length >= 8) && (comprobarPassword($(this).val())>0 )){
                    $('#barraEasy').css({
                        "background-color": "green",
                        "width": "100%",
                        "height": "7px",
                        "border-radius": "5px",
                    });
                }
                $("#labelPass").fadeIn();
            });


            //}, 400);

        });

        $('#exampleInputPassword1').keyup(function(){

            //Si estan vacios o no son iguales...
            if( (($('#exampleInputPassword1').val() == "")&&($('#contrasenya').val() =="")) || ($('#exampleInputPassword1').val() != $('#contrasenya').val()) ){

                $("#contrasenya").removeClass("passOk");
                $("#contrasenya").addClass("passKo");


            } else {

                $("#contrasenya").removeClass("passKo");
                $("#contrasenya").addClass("passOk");

            }

        });
        
        $('#contrasenya').keyup(function(){

            //Si estan vacios o no son iguales...
            if( (($('#exampleInputPassword1').val() == "")&&($('#contrasenya').val() =="")) || ($('#exampleInputPassword1').val() != $('#contrasenya').val()) ){

                $("#contrasenya").removeClass("passOk");
                $("#contrasenya").addClass("passKo");


            } else {

                $("#contrasenya").removeClass("passKo");
                $("#contrasenya").addClass("passOk");

            }

        });
        
        function comprobarPassword(string){
            
            var nums = 0;
            
            for(var i=0;i<string.length;i++){
                //Si el caracter es un numero
                if(!(isNaN(string.charAt(i)))){
                    //Además, si el string tiene 8 carácteres
                    if(string.length >= 8){
                    //Lo damos por bueno, y sumamos uno
                        nums++;
                    }
                    //alert(“‘” + num + “‘ No es un número”);
                }
            }
            
            return nums;
        }


    });

    //$('#exampleInputPassword2').focus(function(){

    /*        function comprobarPass(){

            pass = $("#exampleInputPassword1").val();
            repass = $("#contrasenya").val();

            $("#contrasenya").addClass("passKo");




        }
*/        
    /*

    });
*/
    // });

</script>
<!--
<style>

.passKo{
background-color: rgb(255, 0, 0, 0.3) !important;
}

.passOk{
background-color: white;
}

</style>
-->

<!-- POLITICA DE COOKIES -->























