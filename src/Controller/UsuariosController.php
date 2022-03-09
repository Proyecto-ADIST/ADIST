<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuariosController extends AbstractController
{

    public function usuarios(): Response
    {
        return $this->render('componentesHTML/usuarios.html.twig', [
            'controller_name' => 'UsuariosController',
        ]);
    }
}
