<?php

namespace App\DataFixtures;

use App\Entity\Producto;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Producto 1
        $producto = new Producto();
        $producto->setNombre("Platano");
        $producto->setTipoProducto("Fruta");
        $producto->setPrecio(0.59);
        $producto->setStock(48);
        $manager->persist($producto);

       // Producto 2
       $producto = new Producto();
       $producto->setNombre("Queso");
       $producto->setTipoProducto("Lacteo");
       $producto->setPrecio(1.59);
       $producto->setStock(10);
       $manager->persist($producto);

       // Producto 3
       $producto = new Producto();
       $producto->setNombre("Lechuga");
       $producto->setTipoProducto("Verdura");
       $producto->setPrecio(0.19);
       $producto->setStock(33);
       $manager->persist($producto);

       $manager->flush();
    }
}
