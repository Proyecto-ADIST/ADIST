<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Entity\Pedido;
use App\Entity\Producto;

class ApiController extends AbstractController
{
    public function buscarProducto(Producto $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $productos = $entityManager->getRepository(Producto::class)->findBySimilarName($request->request->get("nombre"));
        
        //crear array vacio llenarlo con los nombres de los productos y crear un jsonresponse con los productos
        return new JsonResponse($this->generateUrl('api_buscar_producto', [
            'id' => $productos->getId(),
          ], UrlGeneratorInterface::ABSOLUTE_URL), 201);
      }

}
