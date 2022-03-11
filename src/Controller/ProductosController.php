<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Producto;

class ProductosController extends AbstractController
{

    public function productos(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $productos = $entityManager->getRepository(Producto::class)->findAll();

        return $this->render('componentesHTML/base.html.twig', [
            'controller_name' => 'ProductosController',
            'productos' => $productos
        ]);
    }
}
