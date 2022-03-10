<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Entity\Pedido;
use App\Entity\Producto;
use PhpParser\Node\Expr\Assign;

class ApiAjaxController extends AbstractController
{
    public function buscarProducto(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $productos = $entityManager->getRepository(Producto::class)->findBySimilarName($request->request->get("nombre"));
        //($request->request->get("nombre"));



        $results = new \stdClass();
        $results->count = count($productos);
        $results = array();


        foreach ($productos as $producto) {
            $result_producto = new \stdClass();
            $result_producto->id = $producto->getId();
            $result_producto->nombre = $producto->getNombre();

            array_push($results, $result_producto);
        }

        return new JsonResponse($results);
    }
}
