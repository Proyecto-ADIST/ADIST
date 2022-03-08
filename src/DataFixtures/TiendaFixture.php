<?php

namespace App\DataFixtures;

use App\Entity\Tienda;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TiendaFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Tienda 1
        $tienda = new Tienda();
        $tienda->setNombre("Manoli's Shop");
        $tienda->setDireccion("C./ Santa Cruz Nº8");
        $manager->persist($tienda);

        $manager->flush();

        // Tienda 2
        $tienda = new Tienda();
        $tienda->setNombre("Mercadona");
        $tienda->setDireccion("C./ Amapola Nº10");
        $manager->persist($tienda);

        $manager->flush();

        // Tienda 3
        $tienda = new Tienda();
        $tienda->setNombre("Aldi");
        $tienda->setDireccion("C./ Pozo Nº 3");
        $manager->persist($tienda);

        $manager->flush();
    }
}
