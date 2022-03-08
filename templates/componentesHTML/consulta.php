<?
/// CONEXIÓN A LA BASE DE DATOS ///
$host = '';
$basededatos = 'db_test';
$usuario = 'root';
$contraseña = 'usuario';

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
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