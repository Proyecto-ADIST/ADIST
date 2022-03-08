<?php

namespace App\DataFixtures;

use App\Entity\Pedido;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PedidoFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $manager->flush();
    }
}
