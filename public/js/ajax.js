
function obtenerProductoPorTipoProducto(id){

        var urlBusqueda = "/api/productos/" + id;
        
        $.ajax({                
                url:   urlBusqueda,
                type:  'get',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                        //pintarProducto();
                }
        });

        
    }

function pintarProducto(response){



}