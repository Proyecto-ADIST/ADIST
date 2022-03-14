
function obtenerProductoPorTipoProducto(id) {

        var urlBusqueda = "/api/productoportipoproducto/" + id;
        var resultado = "#resultado" + id;

        $.ajax({
                url: urlBusqueda,
                type: 'get',
                dataType: 'json',
                beforeSend: function () {
                        $(resultado).html("Procesando, espere por favor...");
                },
                success: function (response) {                       


                        var html_respuesta = "<p>" ; 

                        // for (let i = 0; i < response.results.length; i++) {
                        //         const element =  array[i];

                        //         html_respuesta  =  "<p>" + response.results[i].nombre + ".</p>"                              
                               
                                
                        // }      
                        for (let i = 0; i < response['count']; i++) {
                                html_respuesta += response.results[i].nombre + " - " + response.results[i].stock + " unidades<br>";
                                
                        }                
                        
                        html_respuesta += "</p>";
                         
                        $(resultado).html(html_respuesta);

                }
        });


}


function obtenerProducto(id) {

        var urlBusqueda = "/api/productos/" + id;

        $.ajax({
                url: urlBusqueda,
                type: 'get',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success: function (response) {
                        $("#resultado").html(response);
                        //pintarProducto();
                }
        });


}

function borrarProducto(id) {

        var urlBusqueda = "/api/productos/" + id;

        $.ajax({
                url: urlBusqueda,
                type: 'delete',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success: function (response) {
                        $("#resultado").html(response);
                        //pintarProducto();
                }
        });


}

function obtenerTiendas() {

        var urlBusqueda = "/api/tiendas/";

        $.ajax({
                url: urlBusqueda,
                type: 'get',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success: function (response) {
                        $("#resultado").html(response);
                        //pintarProducto();
                }
        });


}

function borrarTienda(id) {

        var urlBusqueda = "/api/tiendas/" + id;

        $.ajax({
                url: urlBusqueda,
                type: 'delete',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success: function (response) {
                        $("#resultado").html(response);
                        //pintarProducto();
                }
        });


}