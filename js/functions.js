//barra de menu de abajo
$(function(){
    margin = 10;
    posicionInicial = 0;
    dom = {}
    st = {
        stickyElement: '.stickyfloat_element',
        footer : 'footer',
    };
    catchDom = function(){
        dom.stickyElement = $(st.stickyElement);
        dom.footer = $(st.footer);
    }
    afterCatchDom = function(){
        functions.ubicarPosicionInicial()
    }
    suscribeEvents = function(){
        $(window).on('scroll', events.moveStick);
    }
    events = {
        moveStick : function(){
            windowpos = $(window).scrollTop();
            box = dom.stickyElement;
            footer = dom.footer.offset();
            if ($(window).height() < footer.top - (windowpos + margin)) {
                pos = windowpos + $(window).height() - (box.height() + margin);
                dom.stickyElement.css({
                    top: pos + "px",
                    bottom: ''
                });
            } else{
                pos = footer.top - (box.height() + margin);
                dom.stickyElement.css({
                    top: pos + "px",
                    bottom: ''
                });
            }
        }
    }
    functions = {
        ubicarPosicionInicial : function(){
            var newPosition = $(window).height() - (dom.stickyElement.height() + margin);
            $(st.stickyElement).css('top', newPosition + "px");
            posicionInicial = newPosition;
        }
    }
    var init = function(){
        catchDom();
        afterCatchDom();
        suscribeEvents();
    };
    init();
});

function editProduct($idProducto) {
    window.open("editProduct.php?id="+$idProducto);
}

function editService($idServicio) {
    window.open("editService.php?id="+$idServicio);
}

function showProduct($idProducto) {
    window.open("showProduct.php?id="+$idProducto);
}

function showService($idServicio) {
    window.open("showService.php?id="+$idServicio);
}

function showProduct($idProducto) {
    window.open("showProduct.php?id="+$idProducto);
}

function showService($idServicio) {
    window.open("showService.php?id="+$idServicio);
}


function showProductIndex($idProducto) {
    window.open("userNotLoggedIn/showProduct.php?id="+$idProducto);
}

function showServiceIndex($idServicio) {
    window.open("userNotLoggedIn/showService.php?id="+$idServicio);
}

function showChatServiceSuyo($idServicio,idUsuario1,idUsuario2) {
    window.open("showChatServiceSuyo.php?idServicio="+$idServicio+"&idUsuario1="+idUsuario1+"&idUsuario2="+idUsuario2);
}

function showChatServiceMio($idServicio,idUsuario1,idUsuario2) {
    window.open("showChatServiceMio.php?idServicio="+$idServicio+"&idUsuario1="+idUsuario1+"&idUsuario2="+idUsuario2);
}

function showChatProductSuyo($idProducto,idUsuario1,idUsuario2) {
    window.open("showChatProductSuyo.php?idProducto="+$idProducto+"&idUsuario1="+idUsuario1+"&idUsuario2="+idUsuario2);
}

function showChatProductMio($idProducto,idUsuario1,idUsuario2) {
    window.open("showChatProductMio.php?idProducto="+$idProducto+"&idUsuario1="+idUsuario1+"&idUsuario2="+idUsuario2);
}

function enviarIdProducto($idProducto){
    location.href = "profile.php?idProducto="+$idProducto;
}

function enviarIdServicio($idServicio){
    location.href = "profile.php?idServicio="+$idServicio;
}

function enviarValoracionProducto($idValoracionProducto){
    location.href = "valoraciones.php?idValoracionProducto="+$idValoracionProducto;
}

function enviarValoracionServicio($idValoracionServicio,$idOtroUsuario){
    location.href = "valoraciones.php?idValoracionServicio="+$idValoracionServicio;
}

function perfilUsuario($idUsuario){
    location.href = "../userLoggedIn/userProfileSeller.php?idUsuario="+$idUsuario;
}

$(document).ready(function() {
    $(".btn-pref .btn").click(function () {
        $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
        // $(".tab").addClass("active"); // instead of this do the below
        $(this).removeClass("btn-default").addClass("btn-primary");
    });
});

/*
$.session.set("esperandoSalida", 0);
$.session.set("esperandoSalida2", 0);

function enviarPrecioProducto(){
    $.session.set("esperandoSalida2", 0);
    $.session.set("categoriaProducto", 0);
    $.session.set("precioMaxMinProducto", 1);
    $.session.set("categoriaServicio", 0);
    $.session.set("precioMaxMinServicio", 0);
}

function enviarCategoriaProducto(){
    $.session.set("esperandoSalida2", 0);
    $.session.set("precioMaxMinProducto", 0);
    $.session.set("categoriaProducto", 1);
    $.session.set("categoriaServicio", 0);
    $.session.set("precioMaxMinServicio", 0);
}

function enviarPrecioServicio(){
    $.session.set("esperandoSalida", 0);
    $.session.set("categoriaProducto", 0);
    $.session.set("precioMaxMinProducto", 0);
    $.session.set("categoriaServicio", 0);
    $.session.set("precioMaxMinServicio", 1);
}

function enviarCategoriaServicio(){
    $.session.set("esperandoSalida", 0);
    $.session.set("categoriaProducto", 0);
    $.session.set("precioMaxMinProducto", 0);
    $.session.set("precioMaxMinServicio", 0);
    $.session.set("categoriaServicio", 1);
}


if ($.session.get("precioMaxMinProducto") != 1){
    if ($.session.get("categoriaProducto") != 1) {
        if ($.session.get("esperandoSalida") != 1) {
            $("#ordenarProductoFechaDesc").hide();
            $("#ordenarProductoFechaAsc").hide();
            $("#ordenarProductoNombreDesc").hide();
            $("#ordenarProductoNombreAsc").hide();
            $("#ordenarProductoPrecioDesc").hide();
            $("#ordenarProductoPrecioAsc").hide();
            $("#ordenarProductoPrecioMaxMin").hide();
            $("#ordenarProductoTema").hide();
        }
    }else{
        $("#ordenarProductoFechaDesc").hide();
        $("#ordenarProductoFechaAsc").hide();
        $("#ordenarProductoNombreDesc").hide();
        $("#ordenarProductoNombreAsc").hide();
        $("#ordenarProductoPrecioDesc").hide();
        $("#ordenarProductoPrecioAsc").hide();
        $("#ordenarProductoPrecioMaxMin").hide();
        $("#ordenarProductoTema").hide();
    }
}else{
    $("#ordenarProductoFechaDesc").hide();
    $("#ordenarProductoFechaAsc").hide();
    $("#ordenarProductoNombreDesc").hide();
    $("#ordenarProductoNombreAsc").hide();
    $("#ordenarProductoPrecioDesc").hide();
    $("#ordenarProductoPrecioAsc").hide();
    $("#ordenarProductoPrecioMaxMin").hide();
    $("#ordenarProductoTema").hide();
}


$("#nombreProducto").click(function () {
    if ($.session.get("nombreProducto") != 1) {
        $("#spannombreProducto").removeClass("glyphicon glyphicon-sort-by-alphabet").addClass("glyphicon glyphicon-sort-by-alphabet-alt");
        $.session.set("esperandoSalida2", 1);
        $.session.set("nombreProducto", 1);
        $.session.set("precioMaxMinProducto", 0);
        $.session.set("categoriaProducto", 0);
        $("#ordenarProductoFechaDesc").hide();
        $("#ordenarProductoFechaAsc").hide();
        $("#ordenarProductoNombreDesc").hide();
        $("#ordenarProductoNombreAsc").show();
        $("#ordenarProductoPrecioDesc").hide();
        $("#ordenarProductoPrecioAsc").hide();
        $("#ordenarProductoPrecioMaxMin").hide();
        $("#ordenarProductoTema").hide();
    }else{
        $("#spannombreProducto").removeClass("glyphicon glyphicon-sort-by-alphabet-alt").addClass("glyphicon glyphicon-sort-by-alphabet");
        $.session.set("esperandoSalida2", 1);
        $.session.set("nombreProducto", 0);
        $.session.set("precioMaxMinProducto", 0);
        $.session.set("categoriaProducto", 0);
        $("#ordenarProductoFechaDesc").hide();
        $("#ordenarProductoFechaAsc").hide();
        $("#ordenarProductoNombreDesc").show();
        $("#ordenarProductoNombreAsc").hide();
        $("#ordenarProductoPrecioDesc").hide();
        $("#ordenarProductoPrecioAsc").hide();
        $("#ordenarProductoPrecioMaxMin").hide();
        $("#ordenarProductoTema").hide();
    }
});

$("#precioProducto").click(function () {
    if ($.session.get("precioProducto") != 1) {
        $("#spanprecioProducto").removeClass("glyphicon-arrow-down").addClass("glyphicon-arrow-up");
        $.session.set("esperandoSalida2", 1);
        $.session.set("precioProducto", 1);
        $.session.set("precioMaxMinProducto", 0);
        $.session.set("categoriaProducto", 0);
        $("#ordenarProductoFechaDesc").hide();
        $("#ordenarProductoFechaAsc").hide();
        $("#ordenarProductoNombreDesc").hide();
        $("#ordenarProductoNombreAsc").hide();
        $("#ordenarProductoPrecioDesc").show();
        $("#ordenarProductoPrecioAsc").hide();
        $("#ordenarProductoPrecioMaxMin").hide();
        $("#ordenarProductoTema").hide();
    }else{
        $("#spanprecioProducto").removeClass("glyphicon-arrow-up").addClass("glyphicon-arrow-down");
        $.session.set("esperandoSalida2", 1);
        $.session.set("precioProducto", 0);
        $.session.set("precioMaxMinProducto", 0);
        $.session.set("categoriaProducto", 0);
        $("#ordenarProductoFechaDesc").hide();
        $("#ordenarProductoFechaAsc").hide();
        $("#ordenarProductoNombreDesc").hide();
        $("#ordenarProductoNombreAsc").hide();
        $("#ordenarProductoPrecioDesc").hide();
        $("#ordenarProductoPrecioAsc").show();
        $("#ordenarProductoPrecioMaxMin").hide();
        $("#ordenarProductoTema").hide();
    }
});

$("#fechaProducto").click(function () {
    if ($.session.get("fechaProducto") != 1) {
        var str = document.getElementById("fechaProducto").innerHTML;
        var res = str.replace("Antiguos", "Nuevos");
        document.getElementById("fechaProducto").innerHTML = res;
        $.session.set("esperandoSalida2", 1);
        $.session.set("fechaProducto", 1);
        $.session.set("precioMaxMinProducto", 0);
        $.session.set("categoriaProducto", 0);
        $("#ordenarProductoFechaDesc").show();
        $("#ordenarProductoFechaAsc").hide();
        $("#ordenarProductoNombreDesc").hide();
        $("#ordenarProductoNombreAsc").hide();
        $("#ordenarProductoPrecioDesc").hide();
        $("#ordenarProductoPrecioAsc").hide();
        $("#ordenarProductoPrecioMaxMin").hide();
        $("#ordenarProductoTema").hide();
    }else{
        var str = document.getElementById("fechaProducto").innerHTML;
        var res = str.replace("Nuevos", "Antiguos");
        document.getElementById("fechaProducto").innerHTML = res;
        $.session.set("esperandoSalida2", 1);
        $.session.set("fechaProducto", 0);
        $.session.set("precioMaxMinProducto", 0);
        $.session.set("categoriaProducto", 0);
        $("#ordenarProductoFechaDesc").hide();
        $("#ordenarProductoFechaAsc").show();
        $("#ordenarProductoNombreDesc").hide();
        $("#ordenarProductoNombreAsc").hide();
        $("#ordenarProductoPrecioDesc").hide();
        $("#ordenarProductoPrecioAsc").hide();
        $("#ordenarProductoPrecioMaxMin").hide();
        $("#ordenarProductoTema").hide();
    }
});



if ($.session.get("precioMaxMinServicio") != 1){
    if ($.session.get("categoriaServicio") != 1) {
        if ($.session.get("esperandoSalida") != 1) {
            $("#ordenarServicioFechaDesc").hide();
            $("#ordenarServicioFechaAsc").hide();
            $("#ordenarServicioNombreDesc").hide();
            $("#ordenarServicioNombreAsc").hide();
            $("#ordenarServicioPrecioDesc").hide();
            $("#ordenarServicioPrecioAsc").hide();
            $("#ordenarServicioPrecioMaxMin").hide();
            $("#ordenarServicioTema").hide();
        }
    }else{
        $("#ordenarServicioFechaDesc").hide();
        $("#ordenarServicioFechaAsc").hide();
        $("#ordenarServicioNombreDesc").hide();
        $("#ordenarServicioNombreAsc").hide();
        $("#ordenarServicioPrecioDesc").hide();
        $("#ordenarServicioPrecioAsc").hide();
        $("#ordenarServicioPrecioMaxMin").hide();
        $("#ordenarServicioTema").hide();
    }
}else{
    $("#ordenarServicioFechaDesc").hide();
    $("#ordenarServicioFechaAsc").hide();
    $("#ordenarServicioNombreDesc").hide();
    $("#ordenarServicioNombreAsc").hide();
    $("#ordenarServicioPrecioDesc").hide();
    $("#ordenarServicioPrecioAsc").hide();
    $("#ordenarServicioPrecioMaxMin").hide();
    $("#ordenarServicioTema").hide();
}

$("#nombreServicio").click(function () {
    if ($.session.get("nombreServicio") != 1) {
        $("#spannombreServicio").removeClass("glyphicon glyphicon-sort-by-alphabet").addClass("glyphicon glyphicon-sort-by-alphabet-alt");
        $.session.set("esperandoSalida2", 1);
        $.session.set("nombreServicio", 1);
        $.session.set("precioMaxMinServicio", 0);
        $.session.set("categoriaServicio", 0);
        $("#ordenarServicioFechaDesc").hide();
        $("#ordenarServicioFechaAsc").hide();
        $("#ordenarServicioNombreDesc").hide();
        $("#ordenarServicioNombreAsc").show();
        $("#ordenarServicioPrecioDesc").hide();
        $("#ordenarServicioPrecioAsc").hide();
        $("#ordenarServicioPrecioMaxMin").hide();
        $("#ordenarServicioTema").hide();
    }else{
        $("#spannombreServicio").removeClass("glyphicon glyphicon-sort-by-alphabet-alt").addClass("glyphicon glyphicon-sort-by-alphabet");
        $.session.set("esperandoSalida2", 1);
        $.session.set("nombreServicio", 0);
        $.session.set("precioMaxMinServicio", 0);
        $.session.set("categoriaServicio", 0);
        $("#ordenarServicioFechaDesc").hide();
        $("#ordenarServicioFechaAsc").hide();
        $("#ordenarServicioNombreDesc").show();
        $("#ordenarServicioNombreAsc").hide();
        $("#ordenarServicioPrecioDesc").hide();
        $("#ordenarServicioPrecioAsc").hide();
        $("#ordenarServicioPrecioMaxMin").hide();
        $("#ordenarServicioTema").hide();
    }
});

$("#precioServicio").click(function () {
    if ($.session.get("precioServicio") != 1) {
        $("#spanprecioServicio").removeClass("glyphicon-arrow-down").addClass("glyphicon-arrow-up");
        $.session.set("esperandoSalida2", 1);
        $.session.set("precioServicio", 1);
        $.session.set("precioMaxMinServicio", 0);
        $.session.set("categoriaServicio", 0);
        $("#ordenarServicioFechaDesc").hide();
        $("#ordenarServicioFechaAsc").hide();
        $("#ordenarServicioNombreDesc").hide();
        $("#ordenarServicioNombreAsc").hide();
        $("#ordenarServicioPrecioDesc").show();
        $("#ordenarServicioPrecioAsc").hide();
        $("#ordenarServicioPrecioMaxMin").hide();
        $("#ordenarServicioTema").hide();
    }else{
        $("#spanprecioServicio").removeClass("glyphicon-arrow-up").addClass("glyphicon-arrow-down");
        $.session.set("esperandoSalida2", 1);
        $.session.set("precioServicio", 0);
        $.session.set("precioMaxMinServicio", 0);
        $.session.set("categoriaServicio", 0);
        $("#ordenarServicioFechaDesc").hide();
        $("#ordenarServicioFechaAsc").hide();
        $("#ordenarServicioNombreDesc").hide();
        $("#ordenarServicioNombreAsc").hide();
        $("#ordenarServicioPrecioDesc").hide();
        $("#ordenarServicioPrecioAsc").show();
        $("#ordenarServicioPrecioMaxMin").hide();
        $("#ordenarServicioTema").hide();
    }
});

$("#fechaServicio").click(function () {
    if ($.session.get("fechaServicio") != 1) {
        var str = document.getElementById("fechaServicio").innerHTML;
        var res = str.replace("Antiguos", "Nuevos");
        document.getElementById("fechaServicio").innerHTML = res;
        $.session.set("esperandoSalida2", 1);
        $.session.set("fechaServicio", 1);
        $.session.set("precioMaxMinServicio", 0);
        $.session.set("categoriaServicio", 0);
        $("#ordenarServicioFechaDesc").show();
        $("#ordenarServicioFechaAsc").hide();
        $("#ordenarServicioNombreDesc").hide();
        $("#ordenarServicioNombreAsc").hide();
        $("#ordenarServicioPrecioDesc").hide();
        $("#ordenarServicioPrecioAsc").hide();
        $("#ordenarServicioPrecioMaxMin").hide();
        $("#ordenarServicioTema").hide();
    }else{
        var str = document.getElementById("fechaServicio").innerHTML;
        var res = str.replace("Nuevos", "Antiguos");
        document.getElementById("fechaServicio").innerHTML = res;
        $.session.set("esperandoSalida2", 1);
        $.session.set("fechaServicio", 0);
        $.session.set("precioMaxMinServicio", 0);
        $.session.set("categoriaServicio", 0);
        $("#ordenarServicioFechaDesc").hide();
        $("#ordenarServicioFechaAsc").show();
        $("#ordenarServicioNombreDesc").hide();
        $("#ordenarServicioNombreAsc").hide();
        $("#ordenarServicioPrecioDesc").hide();
        $("#ordenarServicioPrecioAsc").hide();
        $("#ordenarServicioPrecioMaxMin").hide();
        $("#ordenarServicioTema").hide();
    }
});
*/