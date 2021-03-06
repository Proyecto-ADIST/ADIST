<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class UsuariosController extends AbstractController
{

    public function usuarios(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $usuarios = $entityManager->getRepository(User::class)->findAll();

        return $this->render('componentesHTML/usuarios.html.twig', [
            'controller_name' => 'UsuariosController',
            'usuarios' => $usuarios
        ]);
    }
}
