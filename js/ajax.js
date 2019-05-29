
//Método que se ejecuta cada vez que se escriba una palabra en el buscador
$(function()
{
    $('.buscadorSinLogin').focus();
    
    $('#search_form').submit(function(e){
        e.preventDefault();
    })
    
    $('.buscadorSinLogin').keyup(function(){
        var envio = $('.buscadorSinLogin').val();
        
        $('#resultado').html('<h2><img src="../img/loading.gif" width="80" /></h2>')
        
        $.ajax({
            type: 'POST',
            url: '../php/Clases/buscador.php',
            data: ('buscadorSinLogin='+envio),
            success: function(resp){
                if(resp != "")
                {
                    $('.mostrarGaleria').hide();
                    $('#resultado').html(resp);
                }
                if(envio == "")
                {
                      $('.mostrarGaleria').show();
                    //$('.ocultardivProd').hide();
                    //$('.ocultardivServ').hide();
                }
                
            }
        })
    })
})

//Buscador interno
$(function()
{
    $('.buscadorInterno').focus();
    
    $('#search_Articles').submit(function(e){
        e.preventDefault();
    })
    
    $('.buscadorInterno').keyup(function(){
        var envioInterno = $('.buscadorInterno').val();
        
        $('#resultadoBusqueda').html('<h2><img src="../../img/loading.gif" width="80" /></h2>')
        
        $.ajax({
            type: 'POST',
            url: '../Clases/buscadorInterno.php',
            data: ('buscadorInterno='+envioInterno),
            success: function(resp){
                if(resp != "")
                {
                    $('#contenerdorArticulos').hide();
                    $('#resultadoBusqueda').html(resp);
                }
                if(envioInterno == "")
                {
                    $('#contenerdorArticulos').show();
                    $('.ocultardivProd').hide();
                    $('.ocultardivServ').hide();
                }
            }
        })
    })
})



