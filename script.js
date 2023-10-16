$(document).ready(function() {
    ///////////////////////////////////////////////////////
    //MANEJO DE LA FUNCION Y EL BOTON PARA ELIMINAR IMPAR//
    ///////////////////////////////////////////////////////
    $('#btn-eliminar-impar').click(function(e) {
        $.ajax({
            type: 'POST',
            url: 'main.php',
            data: {
                eliminarImpar: true
            },
            success: function(response) {
                $('#respuesta-btn').html(response);
                console.log('funcino!');
            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
                $('#respuesta-btn').html('Error al eliminar productos: ' + error);
            }
        });
    });
    
    /////////////////////////////////////////////////////
    //MANEJO DE LA FUNCION Y EL BOTON PARA AGREGAR CIEN//
    /////////////////////////////////////////////////////
    $('#btn-agregar-cien').click(function(e){
        console.log('cieen boton apretado');
        $.ajax({
            type: 'POST',
            url: 'main.php',
            data: {
                agregarCien: true
            },
            success: function(response){
                $('#respuesta-btn').html(response);
                console.log('se agregaron 100')
            },
            error: function(error){
                console.log('Error: ' + error);
                $('#respuesta-btn').html('Error al eliminar productos: ' + error);
            }
        })
    })
});