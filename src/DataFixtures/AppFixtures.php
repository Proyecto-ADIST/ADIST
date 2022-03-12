<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Entity\Tienda;
use App\Entity\Pedido;
use App\Entity\Producto;
use App\Entity\TipoProducto;

class AppFixtures extends Fixture
{   
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        //------------------USUARIOS------------------//
        // Usuario repartidor
        $usuario1 = new User();
        $usuario1->setName("Laura");
        $usuario1->setLastname("Moreno");
        $usuario1->setEmail("repartidor@gmail.com");
        $usuario1->setPassword($this->passwordEncoder->encodePassword(
            $usuario1,
            '123456' // La contraseña
        ));
        $usuario1->setRoles(array("ROLE_REPARTIDOR"));
        $manager->persist($usuario1);

        // Usuario almacenista
        $usuario2 = new User();
        $usuario2->setName("Jesus");
        $usuario2->setLastname("Pardal");
        $usuario2->setEmail("almacenista@gmail.com");
        $usuario2->setPassword($this->passwordEncoder->encodePassword(
            $usuario2,
            '123456' // La contraseña
        ));
        $usuario2->setRoles(array("ROLE_ALMACENISTA"));
        $manager->persist($usuario2);

        // Usuario administrador
        $usuario3 = new User();
        $usuario3->setName("Manuel");
        $usuario3->setLastname("Gómez");
        $usuario3->setEmail("administrador@gmail.com");
        $usuario3->setPassword($this->passwordEncoder->encodePassword(
            $usuario3,
            '123456'
        ));
        $usuario3->setRoles(array("ROLE_ADMIN"));
        $manager->persist($usuario3);



        //------------------TIENDAS------------------//

        // Tienda 1
        $tienda1 = new Tienda();
        $tienda1->setNombre("Manoli's Shop");
        $tienda1->setDireccion("C./ Santa Cruz Nº8");
        $manager->persist($tienda1);

        $manager->flush();

        // Tienda 2
        $tienda2 = new Tienda();
        $tienda2->setNombre("Mercadona");
        $tienda2->setDireccion("C./ Amapola Nº10");
        $manager->persist($tienda2);

        $manager->flush();

        // Tienda 3
        $tienda3 = new Tienda();
        $tienda3->setNombre("Aldi");
        $tienda3->setDireccion("C./ Pozo Nº 3");
        $manager->persist($tienda3);


        //------------------TIPO_PRODUCTOS------------------//

        // Tipo Producto 1
        $tipoProducto1 = new TipoProducto();
        $tipoProducto1->setTipo("Fruta");
        $manager->persist($tipoProducto1);

        // Tipo Producto 2
        $tipoProducto2 = new TipoProducto();
        $tipoProducto2->setTipo("Lacteo");
        $manager->persist($tipoProducto2);

        // Tipo Producto 3
        $tipoProducto3 = new TipoProducto();
        $tipoProducto3->setTipo("Verdura");
        $manager->persist($tipoProducto3);

        //------------------PRODUCTOS------------------//

        // Producto 1
        $producto1 = new Producto();
        $producto1->setNombre("Platano");
        $producto1->setPrecio(0.59);
        $producto1->setStock(48);
        $producto1->setTipoProducto($tipoProducto1);
        $manager->persist($producto1);

        // Producto 2
        $producto2 = new Producto();
        $producto2->setNombre("Yogurt");
        $producto2->setPrecio(1.59);
        $producto2->setStock(33);
        $producto2->setTipoProducto($tipoProducto2);
        $manager->persist($producto2);

        // Producto 3
        $producto3 = new Producto();
        $producto3->setNombre("Lechuga");
        $producto3->setPrecio(0.30);
        $producto3->setStock(10);
        $producto3->setTipoProducto($tipoProducto3);
        $manager->persist($producto3);

        // Producto 4
        $producto4 = new Producto();
        $producto4->setNombre("Manzana");
        $producto4->setPrecio(0.11);
        $producto4->setStock(102);
        $producto4->setTipoProducto($tipoProducto1);
        $manager->persist($producto4);

        //------------------PEDIDOS------------------//
        
        // Pedido 1
        $pedido1 = new Pedido();
        $pedido1->setUser($usuario1);
        $pedido1->addProducto($producto1);
        $pedido1->addProducto($producto4);
        $pedido1->setTienda($tienda1);
        $manager->persist($pedido1);

        // Pedido 2
        $pedido2 = new Pedido();
        $pedido2->setUser($usuario1);
        $pedido2->addProducto($producto2);
        $pedido2->addProducto($producto3);
        $pedido2->setTienda($tienda2);
        $manager->persist($pedido2);

        //------------------PEDIDOS_PRODUCTOS------------------//

        $manager->flush();
    }
}
