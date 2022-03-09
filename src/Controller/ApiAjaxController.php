<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Entity\Pedido;
use App\Entity\Producto;
use PhpParser\Node\Expr\Assign;

class ApiController extends AbstractController
{
    public function buscarProducto(String $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $productos = $entityManager->getRepository(Producto::class)->findBySimilarName($request);
        //($request->request->get("nombre"));



        $results = new \stdClass();
        $results->count = count($productos);
        $results->results = array();


        foreach ($productos as $producto) {
            $result = new \stdClass();
            $result->id = $producto->getId();
            $result->url = $this->generateUrl('api_buscar_producto', [
                'id' => $result->id,
            ], UrlGeneratorInterface::ABSOLUTE_URL);

            array_push($results->results, $result);
        }

        return new JsonResponse($results);
    }
}
