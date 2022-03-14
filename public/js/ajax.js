
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


                        // var html_respuesta = "<p>" ; 


                        // for (let i = 0; i < response['count']; i++) {
                        //         html_respuesta += response.results[i].nombre + " - " + response.results[i].stock + " unidades<br>";

                        // }                

                        // html_respuesta += "</p>";

                        var html_respuesta = "<table class='table table-bordered' style='border: solid 2px;'>" + 
                        "<tr>" +
                                "<th>Producto</th>" + 
                                "<th>Stock</th>" +
                                "<th>Precio</th>" 
                        "</tr>"
                        
                        ;

                        
                        for (let i = 0; i < response['count']; i++) {

                                html_respuesta += "<tr>" + "<td>" + response.results[i].nombre + " </td><td>"  +response.results[i].stock 
                                + " </td><td>"  +response.results[i].precio + " € </td></tr>";

                        }

                        

                        html_respuesta += "</table>";

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