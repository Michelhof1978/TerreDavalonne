<?php

namespace App\DataFixtures;
use App\Entity\User;
use symfony\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }


    public function load(ObjectManager $manager): void
    {
         $admin = new User();
         $admin -> setEmail('michel.hof@hotmail.fr');
         $admin -> setLastname('HOFFMANN');
         $admin -> setFirstname('MICHEL');
         $admin -> setPassword(
             $this->passwordHasher->HashPassword($admin, 'admin'));
         $admin->setRoles(['ROLE_ADMIN']);

         $manager->persist($admin);
         $manager->flush();
    }
}
