
function obtenerProductoPorTipoProducto(id) {

        var urlBusqueda = "/api/tipoproducto/" + id;

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


function pintarProducto(response) {

        $response.id;


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