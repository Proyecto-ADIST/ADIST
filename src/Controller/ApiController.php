<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Pedido;
use App\Entity\Producto;
use App\Entity\Tienda;
use App\Entity\User;
use App\Entity\TipoProducto;

class ApiController extends AbstractController
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    function getUsuario($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $usuario = $entityManager->getRepository(User::class)->find($id);
        // Si el producto no existe devolvemos un error con código 404.
        if ($usuario == null) {
            return new JsonResponse([
                'error' => 'NO se ha encontrado el Producto'
            ], 404);
        }
        // Creamos un objeto genérico y lo rellenamos con la información.
        $result = new \stdClass();
        $result->id = $usuario->getId();
        $result->email = $usuario->getEmail();
        $result->roles = $usuario->getRoles();
        $result->apellidos = $usuario->getLastname();
        $result->nombre = $usuario->getName();

        return new JsonResponse($result);
    }

    function getUsuarios()
    {

        $entityManager = $this->getDoctrine()->getManager();
        $usuarios = $entityManager->getRepository(User::class)->findAll();


        if ($usuarios == null) {
            return new JsonResponse([
                'error' => 'No se han encontrado usuarios'
            ], 404);
        }


        $results = new \stdClass();
        $results->count = count($usuarios);
        $results->results = array();


        foreach ($usuarios as $usuario) {
            $result = new \stdClass();
            $result->id = $usuario->getId();
            $result->email = $usuario->getEmail();
            $result->roles = $usuario->getRoles();
            $result->apellidos = $usuario->getLastname();
            $result->nombre = $usuario->getName();

            array_push($results->results, $result);
        }

        // Devolvemos el resultado en formato JSON
        return new JsonResponse($results);
    }

    function getProducto($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $producto = $entityManager->getRepository(Producto::class)->find($id);
        // Si el producto no existe devolvemos un error con código 404.
        if ($producto == null) {
            return new JsonResponse([
                'error' => 'NO se ha encontrado el Producto'
            ], 404);
        }
        // Creamos un objeto genérico y lo rellenamos con la información.
        $result = new \stdClass();
        $result->id = $producto->getId();
        $result->nombre = $producto->getNombre();
        $result->tipo = $producto->getTipoProducto();
        $result->precio = $producto->getPrecio();
        $result->stock = $producto->getStock();

        return new JsonResponse($result);
    }

    function getProductos()
    {

        $entityManager = $this->getDoctrine()->getManager();
        $productos = $entityManager->getRepository(Producto::class)->findAll();


        if ($productos == null) {
            return new JsonResponse([
                'error' => 'No se han encontrado productos'
            ], 404);
        }


        $results = new \stdClass();
        $results->count = count($productos);
        $results->results = array();

        
        foreach ($productos as $producto) {
            $tipoProducto = $entityManager->getRepository(TipoProducto::class)->find($producto->getTipoProducto());
            $result = new \stdClass();
            $result->id = $producto->getId();
            $result->nombre = $producto->getNombre();
            $result->tipo = $tipoProducto->getTipo();
            $result->precio = $producto->getPrecio();
            $result->stock = $producto->getStock();
            $result->url = $this->generateUrl('api_get_producto', [
                'id' => $result->id,
            ], UrlGeneratorInterface::ABSOLUTE_URL);

            array_push($results->results, $result);
        }

        // Devolvemos el resultado en formato JSON
        return new JsonResponse($results);
    }
    
    //PROBLEMA
    function getTipoProducto($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $tipoproducto = $entityManager->getRepository(TipoProducto::class)->find($id);
        // Si el Tipo de producto no existe devolvemos un error con código 404.
        if ($tipoproducto == null) {
            return new JsonResponse([
                'error' => 'No tenemos este tipo de producto'
            ], 404);
        }
        // Creamos un objeto genérico y lo rellenamos con la información.
        $result = new \stdClass();
        $result->id = $tipoproducto->getId();
        $result->tipo = $tipoproducto->getTipo();
        
        
        // Al utilizar JsonResponse, la conversión del objeto $result a JSON se hace de forma automática.
        return new JsonResponse($result);
    }

    function getProductosPorTipoProducto($idtipo)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $productos = $entityManager->getRepository(Producto::class)->findBy(['tipo_producto'=>$idtipo]);
        // Si el Tipo de producto no existe devolvemos un error con código 404.
        if ($productos == null) {
            return new JsonResponse([
                'error' => 'No tenemos este tipo de producto'
            ], 404);
        }
        // Creamos un objeto genérico y lo rellenamos con la información.
        $results = new \stdClass();
        $results->count = count($productos);
        $results->results = array();

        
        foreach ($productos as $producto) {           
            $result = new \stdClass();
            $result->id = $producto->getId();
            $result->nombre = $producto->getNombre();            
            $result->precio = $producto->getPrecio();
            $result->stock = $producto->getStock();
            $result->url = $this->generateUrl('api_get_producto', [
                'id' => $result->id,
            ], UrlGeneratorInterface::ABSOLUTE_URL);

            array_push($results->results, $result);
        }

        // Devolvemos el resultado en formato JSON
        return new JsonResponse($results);
    }

    function getTienda($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $tienda = $entityManager->getRepository(Tienda::class)->find($id);
        // Si el producto no existe devolvemos un error con código 404.
        if ($tienda == null) {
            return new JsonResponse([
                'error' => 'NO se ha encontrado el Producto'
            ], 404);
        }
        // Creamos un objeto genérico y lo rellenamos con la información.
        $result = new \stdClass();
        $result->id = $tienda->getId();
        $result->nombre = $tienda->getNombre();
        $result->direccion = $tienda->getDireccion();

        return new JsonResponse($result);
    }

    function getTiendas()
    {

        $entityManager = $this->getDoctrine()->getManager();
        $tiendas = $entityManager->getRepository(Tienda::class)->findAll();


        if ($tiendas == null) {
            return new JsonResponse([
                'error' => 'No se han encontrado tiendas'
            ], 404);
        }


        $results = new \stdClass();
        $results->count = count($tiendas);
        $results->results = array();


        foreach ($tiendas as $tienda) {
            $result = new \stdClass();
            $result->id = $tienda->getId();
            $result->nombre = $tienda->getNombre();
            $result->direccion = $tienda->getDireccion();
            $result->url = $this->generateUrl('api_get_tienda', [
                'id' => $result->id,
            ], UrlGeneratorInterface::ABSOLUTE_URL);

            array_push($results->results, $result);
        }

        // Devolvemos el resultado en formato JSON
        return new JsonResponse($results);
    }

    function getPedidos()
    {

        $entityManager = $this->getDoctrine()->getManager();
        $pedidos = $entityManager->getRepository(Pedido::class)->findAll();

        if ($pedidos == null) {
            return new JsonResponse([
                'error' => 'No se han encontrado pedidos'
            ], 404);
        }


        $results = new \stdClass();
        $results->count = count($pedidos);
        $results->results = array();

        foreach ($pedidos as $pedido) {
            $user = $entityManager->getRepository(User::class)->find($pedido->getUser());
            $tienda = $entityManager->getRepository(Tienda::class)->find($pedido->getTienda());
            $result = new \stdClass();
            $result->id = $pedido->getId();
            $result->user = $user->getName();
            //$result->producto = $pedido->getProducto();
            //$result->producto = array();
            foreach ($pedido->getProducto() as $producto) {
                $result->productos[] = $producto->getNombre();
            }
            $result->tienda = $tienda->getNombre();
            $result->direccion = $tienda->getDireccion();

            array_push($results->results, $result);
        }

        // Devolvemos el resultado en formato JSON
        return new JsonResponse($results);
    }

    function postProducto(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $producto = $entityManager->getRepository(Producto::class)->findOneBy(['nombre' => $request->request->get("nombre")]);
        if ($producto) {
            return new JsonResponse([
                'error' => 'El producto ya está registrado'
            ], 404);
        }

        $tipoProducto = $entityManager->getRepository(TipoProducto::class)->findOneBy(['tipo' => $request->request->get("tipo_producto")]);
        $producto = new Producto();
        $producto->setNombre($request->request->get("nombre"));
        $producto->setTipoProducto($tipoProducto);
        $producto->setPrecio($request->request->get("precio"));
        $producto->setStock($request->request->get("stock"));
        $entityManager->persist($producto);
        $entityManager->flush();


        $result = new \stdClass();
        $result->id = $producto->getId();
        $result->nombre = $producto->getNombre();
        $result->tipo = $tipoProducto->getTipo();
        $result->precio = $producto->getPrecio();
        $result->stock = $producto->getStock();


        return new JsonResponse($result, 201);
    }

    function postTienda(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $tienda = $entityManager->getRepository(Tienda::class)->findOneBy(['nombre' => $request->request->get("nombre")]);
        if ($tienda) {
            return new JsonResponse([
                'error' => 'La tienda ya está registrada'
            ], 404);
        }

        $tienda = new Tienda();
        $tienda->setNombre($request->request->get("nombre"));
        $tienda->setDireccion($request->request->get("direccion"));
        $entityManager->persist($tienda);
        $entityManager->flush();


        $result = new \stdClass();
        $result->id = $tienda->getId();
        $result->nombre = $tienda->getNombre();
        $result->direccion = $tienda->getDireccion();

        return new JsonResponse($result, 201);
    }
    /*
    function postPedido(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($request->request->get("user"));
        if ($user) {
            return new JsonResponse([
                'error' => 'El usuario se encuentra'
            ], 404);
        }   

        $nombreProducto = 
        $nombreTienda = $entityManager->getRepository(TipoProducto::class)->findOneBy(['tipo' => $request->request->get("tipo_producto")]);
        $pedido = new Pedido();
        $pedido->setUser($request->request->get("nombre"));
        $pedido->setTienda($tipoProducto);
        $pedido->setPrecio($request->request->get("precio"));
        $pedido->setStock($request->request->get("stock"));
        $entityManager->persist($producto);
        $entityManager->flush();


        $result = new \stdClass();
        $result->id = $producto->getId();
        $result->nombre = $producto->getNombre();
        $result->tipo = $tipoProducto->getTipo();
        $result->precio = $producto->getPrecio();
        $result->stock = $producto->getStock();


        return new JsonResponse($result, 201);
    }
    */
    //PROBLEMA: NO SETEA EL ID DEL CAMPO TIPO_PRODUCTO_ID DE LA TABLA PRODUCTO
    function putProducto(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $producto = $entityManager->getRepository(Producto::class)->find($id);
        if ($producto == null) {
            return new JsonResponse([
                'error' => 'El producto no existe'
            ], 404);
        }

        $tipoProducto = $entityManager->getRepository(TipoProducto::class)->findOneBy(['tipo' => $request->request->get("tipo_producto")]);
        $producto->setNombre($request->request->get("nombre"));
        $producto->setTipoProducto($tipoProducto);
        $producto->setPrecio($request->request->get("precio"));
        $producto->setStock($request->request->get("stock"));
        
        $entityManager->flush();

        $result = new \stdClass();
        $result->id = $producto->getId();
        $result->nombre = $producto->getNombre();
        $result->tipo = $tipoProducto->getTipo();
        $result->precio = $producto->getPrecio();
        $result->stock = $producto->getStock();

        return new JsonResponse($result);
    }

    function putTienda(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $tienda = $entityManager->getRepository(Tienda::class)->find($id);
        if ($tienda == null) {
            return new JsonResponse([
                'error' => 'La tienda no se encuentra'
            ], 404);
        }
        
        $tienda->setNombre($request->request->get("nombre"));
        $tienda->setDireccion($request->request->get("direccion"));
        $entityManager->flush();

        $result = new \stdClass();
        $result->id = $tienda->getId();
        $result->nombre = $tienda->getNombre();
        $result->direccion = $tienda->getDireccion();
        

        return new JsonResponse($result);
    }

    function deleteProducto($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $producto = $entityManager->getRepository(Producto::class)->find($id);
        if ($producto == null) {
            return new JsonResponse([
                'error' => 'El producto no existe'
            ], 404);
        }

        $entityManager->remove($producto);
        $entityManager->flush();

        return new JsonResponse(null, 204);
    }

    function deleteTienda($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $tienda = $entityManager->getRepository(Tienda::class)->find($id);
        if ($tienda == null) {
            return new JsonResponse([
                'error' => 'La tienda no existe'
            ], 404);
        }

        $entityManager->remove($tienda);
        $entityManager->flush();

        return new JsonResponse(null, 204);
    }

    function deletePedido($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $pedido = $entityManager->getRepository(Pedido::class)->find($id);
        if ($pedido == null) {
            return new JsonResponse([
                'error' => 'El pedido no existe no existe'
            ], 404);
        }

        $entityManager->remove($pedido);
        $entityManager->flush();

        return new JsonResponse(null, 204);
    }
}
