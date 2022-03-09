<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Entity\Pedido;
use App\Entity\Producto;
use App\Entity\Tienda;
use App\Entity\User;

class ApiController extends AbstractController
{
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
                'error' => 'No se han encontrados los Tweets'
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

    /*function getProductoUser($id) {
        // TODO
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);
        
        if ($user == null) {
            return new JsonResponse([
                'error' => 'No se ha encontrado el User'
            ], 404);
        }
        
        $result = new \stdClass();
        $result->id = $user->getId();
        $result->name = $user->getName();
        $result->user_name = $user->getUserName();


       $result->tweets = array();
       foreach ($user->getTweets() as $tweet) {
           $result->tweets[] = $this->generateUrl('api_get_tweet', [
               'id' => $tweet->getId(),
           ], UrlGeneratorInterface::ABSOLUTE_URL);
       }

       $result->likes = array();
       foreach ($user->getLikes() as $tweet) {
           $result->likes[] = $this->generateUrl('api_get_tweet', [
               'id' => $tweet->getId(),
           ], UrlGeneratorInterface::ABSOLUTE_URL);
       }

        return new JsonResponse($result);
    }*/
}
