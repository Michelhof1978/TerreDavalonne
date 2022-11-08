<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Partenaire;
use Faker;

class PartenaireFixtures extends Fixture implements DependentFixtureInterface
{
  public function load(ObjectManager $manager)
  {
    $faker = Faker\Factory::create('fr_FR');
    $partenaires = array();
    for ($i = 0; $i < 4; $i++) {
      $partenaires[$i] = new Partenaire();
      $partenaires[$i]->setName($faker->lastName);
      $partenaires[$i]->setDescription($faker->text());
      $partenaires[$i]->setLienPartenaire($faker->url());
      $manager->persist($partenaires[$i]);
      $this->addReference('partenaire_' . ($i + 1), $partenaires[$i]);
    }

    $manager->flush();
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
    ];
  }
}
