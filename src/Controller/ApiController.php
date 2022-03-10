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
        // Para enlazar al usuario, añadimos el enlace API para consultar su información.
        /*$result->user = $this->generateUrl('api_get_user', [
            'id' => $producto->getUser()->getId(),
        ], UrlGeneratorInterface::ABSOLUTE_URL);
        // Para enlazar a los usuarios que han dado like al tweet, añadimos sus enlaces API.
        $result->likes = array();
        foreach ($producto->getLikes() as $user) {
            $result->likes[] = $this->generateUrl('api_get_user', [
                'id' => $user->getId(),
            ], UrlGeneratorInterface::ABSOLUTE_URL);
        }*/
        // Al utilizar JsonResponse, la conversión del objeto $result a JSON se hace de forma automática.
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
            $result = new \stdClass();
            $result->id = $producto->getId();
            $result->nombre = $producto->getNombre();
            $result->tipo = $producto->getTipoProducto();
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
        // Para enlazar al usuario, añadimos el enlace API para consultar su información.
        /*$result->user = $this->generateUrl('api_get_user', [
            'id' => $producto->getUser()->getId(),
        ], UrlGeneratorInterface::ABSOLUTE_URL);
        // Para enlazar a los usuarios que han dado like al tweet, añadimos sus enlaces API.
        $result->likes = array();
        foreach ($producto->getLikes() as $user) {
            $result->likes[] = $this->generateUrl('api_get_user', [
                'id' => $user->getId(),
            ], UrlGeneratorInterface::ABSOLUTE_URL);
        }*/
        // Al utilizar JsonResponse, la conversión del objeto $result a JSON se hace de forma automática.
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

    //PROBLEMA: TE DEVUELVE LOS USERS Y LOS PRODUCTOS EN EL POSTMAN RAROS
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
            $result = new \stdClass();
            $result->id = $pedido->getId();
            $result->user = $pedido->getUser();
            $result->producto = $pedido->getProducto();
            $result->tienda = $pedido->getTienda();

            array_push($results->results, $result);
        }

        // Devolvemos el resultado en formato JSON
        return new JsonResponse($results);
    }

    /*
    function postUsuario(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->findOneBy(['email' => $request->request->get("email")]);
        if ($user) {
            return new JsonResponse([
                'error' => 'User with this email already exists'
            ], 409);
        }
        $user = new User();
        $user->setName($request->request->get("name"));
        $user->setLastname($request->request->get("lastname"));
        $user->setEmail($request->request->get("email"));
        $user->setPassword($request->request->get("password"));
        //$user->setRoles($request->request->get("rol"));
        $entityManager->persist($user);
        $entityManager->flush();
        $result = new \stdClass();
        $result->id = $user->getId();
        $result->email = $user->getEmail();
        $result->roles = $user->getRoles();
        $result->apellidos = $user->getLastname();
        $result->nombre = $user->getName();
        
        return new JsonResponse($result, 201);
    }*/

    function postProducto(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $producto = $entityManager->getRepository(Producto::class)->findOneBy(['nombre' => $request->request->get("nombre")]);
        if ($producto) {
            return new JsonResponse([
                'error' => 'El producto ya está registrado'
            ], 404);
        }

        $producto = new Producto();
        $producto->setNombre($request->request->get("nombre"));
        $producto->setTipoProducto($request->request->get("tipo_producto"));
        $producto->setPrecio($request->request->get("precio"));
        $producto->setStock($request->request->get("stock"));
        $entityManager->persist($producto);
        $entityManager->flush();

      
        $result = new \stdClass();
        $result->id = $producto->getId();
        $result->nombre = $producto->getNombre();
        $result->tipo = $producto->getTipoProducto();
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

    //PROBLEMA: NO LO BORRA POR LA RELACIÓN MANY TO MANY DEL MAPPED EN PRODUCTO 
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

    //PROBLEMA: NO LO BORRA POR LA RELACIÓN DEL MAPPED EN TIENDA
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

}
