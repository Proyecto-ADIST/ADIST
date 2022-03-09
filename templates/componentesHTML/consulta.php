<?
/// CONEXIÓN A LA BASE DE DATOS ///

$bd = new PDO("mysql:host=localhost; dbname=db_test", "root", "usuario");
$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $sql = "SELECT * FROM productos";
    $result = $bd->query($sql);
}
catch (PDOException $p) {
    echo "Error ".$p->getMessage()."<br />";
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT * FROM productos ORDER BY id";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['productos']))
{
	$q=$conexion->real_escape_string($_POST['productos']);
	$query="SELECT * FROM productos WHERE 
		id LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
		tipoProducto LIKE '%".$q."%' OR
		precio LIKE '%".$q."%' OR
		stock LIKE '%".$q."%'";
}

$buscarProductos=$conexion->query($query);
if ($buscarProductos->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>ID PRODUCTO</td>
			<td>NOMBRE</td>
			<td>TIPO</td>
			<td>PRECIO</td>
            <td>STOCK</td>
		</tr>';

	while($filaProductos= $filaProductos->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filaProductos['id'].'</td>
			<td>'.$filaProductos['nombre'].'</td>
			<td>'.$filaProductos['tipoProducto'].'</td>
			<td>'.$filaProductos['precio'].'</td>
            <td>'.$filaProductos['stock'].'</td>
			<td>'.$filaProductos['pedidos'].'</td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>