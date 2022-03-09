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
    public function buscarProducto(Producto $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $productos = $entityManager->getRepository(Producto::class)->findBySimilarName($request->request->get("nombre"));
        
        $productos = [];
        //for ($productos : $producto) { 
            # code...
        //}
        
        //crear array vacio llenarlo con los nombres de los productos(for) y crear un jsonresponse con los productos

        //json = Objects.assign({}, productos)
        return new JsonResponse($this->generateUrl('api_buscar_producto', [
            'id' => $productos->getId(),
          ], UrlGeneratorInterface::ABSOLUTE_URL), 201);
      }

}
