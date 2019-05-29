function borrar_usuario() {
    eliminar = confirm("Se borraran todos los datos de esta cuenta, incluidos productos y servicios, ¿Deseas eliminar esta cuenta?");
    if (eliminar)
    //Redireccionamos si das a aceptar
        window.location.href = "../main.php?tipo=eliminarUsuario"; //página web a la que te redirecciona si confirmas la eliminación
    else
    //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
        alert('No se ha podido eliminar el usuario...')
}

function borrar_producto() {
    eliminar = confirm("¿Deseas eliminar este producto?");
    if (eliminar)
    //Redireccionamos si das a aceptar
        window.location.href = "../main.php?tipo=eliminarProducto"; //página web a la que te redirecciona si confirmas la eliminación
    else
    //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
        alert('No se ha podido eliminar el producto...')
}

function borrar_servicio() {
    eliminar = confirm("¿Deseas eliminar este servicio?");
    if (eliminar)
    //Redireccionamos si das a aceptar
        window.location.href = "../main.php?tipo=eliminarServicio"; //página web a la que te redirecciona si confirmas la eliminación
    else
    //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
        alert('No se ha podido eliminar el servicio...')
}

function borrar_producto_ya() {
    eliminar = confirm("¿Deseas eliminar este producto?");
    if (eliminar)
    //Redireccionamos si das a aceptar
        window.location.href = "../main.php?tipo=eliminarProducto"; //página web a la que te redirecciona si confirmas la eliminación
    else
    //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
        alert('No se ha podido eliminar el producto...')
}

function borrar_servicio_ya() {
    eliminar = confirm("¿Deseas eliminar este servicio?");
    if (eliminar)
    //Redireccionamos si das a aceptar
        document.formulario.submit();
         else
    //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
        alert('No se ha podido eliminar el servicio...')
}
