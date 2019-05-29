$("document").ready(function(){

    // MODAL BUSCAR
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
    
    // MODAL REGISTRO
    $('#register').on('shown.bs.modal', function () {
        $('#myInput2').focus()
    })

    // MODAL REGISTRO
    $('#articulo').on('shown.bs.modal', function () {
        $('#myInput3').focus()
    })

});

