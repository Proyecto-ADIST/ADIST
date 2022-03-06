<?php

namespace App\DataFixtures;
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsuarioFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // Usuario repartidor
        $usuario = new User();
        $usuario->setName("Laura");
        $usuario->setLastname("Moreno");
        $usuario->setEmail("repartidor@gmail.com");
        $usuario->setPassword($this->passwordEncoder->encodePassword(
            $usuario,
            '123456' // La contraseña
        ));
        $usuario->setRoles(array("ROLE_REPARTIDOR"));
        $manager->persist($usuario);

        // Usuario almacenista
        $usuario = new User();
        $usuario->setName("Jesus");
        $usuario->setLastname("Pardal");
        $usuario->setEmail("almacenista@gmail.com");
        $usuario->setPassword($this->passwordEncoder->encodePassword(
            $usuario,
            '123456' // La contraseña
        ));
        $usuario->setRoles(array("ROLE_ALMACENISTA"));
        $manager->persist($usuario);

        // Usuario administrador
        $usuario = new User();
        $usuario->setName("Manuel");
        $usuario->setLastname("Gómez");
        $usuario->setEmail("administrador@gmail.com");
        $usuario->setPassword($this->passwordEncoder->encodePassword(
            $usuario,
            '123456'
        ));


        // Le damos el rol de administrador (ROLE_ADMIN).
        $usuario->setRoles(array("ROLE_ADMIN"));
        $manager->persist($usuario);

        $manager->flush();
    }
}