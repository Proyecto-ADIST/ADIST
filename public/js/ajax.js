
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

/*
function borrarProducto(id) {//NO FUNCIONA PARA TODAS LAS IDs

        var urlBusqueda = "/api/productos/" + id;
        var resultado = "#producto" + id;

        $.ajax({
                url: urlBusqueda,
                type: 'DELETE',
                success: function (response) {
                        $(resultado).remove();
                        alert( "Se ha eliminado correctamente");
                }
        });


}


function borrarTienda(id) {//NO FUNCIONA PARA TODAS LAS IDs

        var urlBusqueda = "/api/tiendas/" + id;
        var resultado = "#tienda" + id;

        $.ajax({
                url: urlBusqueda,
                type: 'DELETE',
                dataType: 'json',

                success: function(){
                        $(resultado).remove();
                        alert( "Se ha eliminado correctamente");
                }
        });
}



function nuevaTienda() {//NO FUNCIONA
        nombre = document.getElementById("nombre").value;
        direccion = document.getElementById("direccion").value;
        // Aquí iría el código de validación
        $.ajax({
          type: "POST", url: "/api/tiendas/", data: "nombre=" + nombre + "&direccion=" + direccion,
          statusCode: {
            404: function() { alert('Página no encontrada'); }
          },
          success: function(result) { alert( "Resultado: " + result ); }
        });
        return false;
    }




function editarProducto(id){//NO FUNCIONA

        var urlBusqueda = "/api/productos/" + id;
        var resultado = "#producto" + id;

        $.ajax({
                url: urlBusqueda,
                type: 'PUT',
                dataType: 'json',

                success: function(){
                        // $(resultado).remove();
                }
        });
}

function editarTienda(id){//NO FUNCIONA

        var urlBusqueda = "/api/tiendas/" + id;
        var resultado = "#tienda" + id;

        $.ajax({
                url: urlBusqueda,
                type: 'PUT',
                dataType: 'json',

                success: function(){
                        // $(resultado).remove();
                }
        });
}
*/