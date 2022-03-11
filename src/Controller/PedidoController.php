<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Pedido;


class PedidoController extends AbstractController
{

    public function pedidos(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $pedidos = $entityManager->getRepository(Pedido::class)->findAll();

        // $entityManager = $this->getDoctrine()->getManager();
        // $pedidoProductos = $entityManager->getRepository(PedidoProducto::class)->findAll();

        return $this->render('componentesHTML/pedidos.html.twig', [
            'controller_name' => 'HomeController',
            'pedidos' => $pedidos
            // 'pedidoProductos' => $pedidos      
        ]);
    }
}
