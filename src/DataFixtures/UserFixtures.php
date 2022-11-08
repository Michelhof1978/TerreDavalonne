<?php

namespace App\DataFixtures;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        // $faker = Faker\Factory::create('fr_FR');
        $user = [];
        $admin = new User();
        $plaintextPassword = 'terredavalonne';
        $hashedPassword = $this->passwordHasher->hashPassword(
            $admin,
            $plaintextPassword
        );
        $admin->setEmail('admin@terredavalonne.com');
        $admin->setCivility('Monsieur');
        $admin->setLastname('Admin');
        $admin->setFirstname('Admin');
        $admin->setBirthday('26/05/1995');
        $admin->setProfessionId($this->getReference('profession_' . 1));
        $admin->setAddress('test');
        $admin->setZip(69000);
        $admin->setCity('Lyon');
        $admin->setCountry('FR');
        $admin->setPhone('0619585430');
        $admin->setPassword($hashedPassword);
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);
        $manager->flush();
        $this->addReference('user_1', $admin);

        $hashedPassword = $this->passwordHasher->hashPassword(
            $admin,
            $plaintextPassword
        );
        $user = (new User())->setEmail('pbidule@free.fr')
            ->setCivility('Monsieur')
            ->setLastname('BIDULE')
            ->setFirstname('Paul')
            ->setBirthday('01/11/1995')
            ->setProfessionId($this->getReference('profession_' . 2))
            ->setAddress('test')
            ->setZip(69000)
            ->setCity('Lyon')
            ->setCountry('FR')
            ->setPhone('0619585430')
            ->setPassword($hashedPassword);

        $manager->persist($user);
        $this->addReference('user_2', $user);

        $user = (new User())->setEmail('terredavalonne@terredavalonne.com')
            ->setCivility('Monsieur')
            ->setLastname('Buffard')
            ->setFirstname('Erik')
            ->setBirthday('01/11/1995')
            ->setProfessionId($this->getReference('profession_' . 2))
            ->setAddress('test')
            ->setZip(69000)
            ->setCity('Lyon')
            ->setCountry('FR')
            ->setRoles(['ROLE_ADMIN'])
            ->setPhone('0619585430')
            ->setPassword($this->passwordHasher->hashPassword(
                $user,
                $plaintextPassword
            ));
        $manager->persist($user);

        $manager->flush();
        $this->addReference('user_3', $user);
    }

    public function getDependencies()
    {
        return [
            ElementBaseFixtures::class,
            ElementPhytoFixtures::class,
            ElementSabbatFixtures::class,
            RecetteTypeFixtures::class,
            ProfessionFixtures::class,
            StatutOrderFixtures::class,
            TypeRecueilFixtures::class,
            TypeAdresseFixtures::class,
            CategoryFixtures::class,
            FAQFixtures::class,
            TypeFixtures::class,
            CoachingVideoFixtures::class,
            FormationNumericFixtures::class,
            EvenementFixtures::class,
            TypeOptionFixtures::class,
            ProductFixtures::class,
            PromotionFixtures::class,
            StockFixtures::class,
            PageFixtures::class,
            TypeBlocFixtures::class,
            ConfigBlocFixtures::class,
            BlocContentFixtures::class,
            BlocContentAttachementFixtures::class
        ];
    }
}
