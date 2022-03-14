<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Producto;
use App\Entity\Pedido;


class HomeController extends AbstractController
{

    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $productos = $entityManager->getRepository(Producto::class)->findAll();

        $entityManager = $this->getDoctrine()->getManager();
        $pedidos = $entityManager->getRepository(Pedido::class)->findAll();


        $api_key= '2ec5e2c352e79005fc8960dc22cb7090';

        $api_url = 'http://api.openweathermap.org/data/2.5/weather?q=London&appid='.$api_key;
        
        $weather_data = json_decode(file_get_contents($api_url),true);
        
        $temperature = $weather_data['main']['temp'];
        
        $temperature_in_celcius = "La temperatura en Écija es de ".round($temperature / 27.3) . "ºC.";
        
       




        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'productos' => $productos,
            'pedidos' => $pedidos,
            'temperatura' => $temperature_in_celcius
        ]);
    }
}
