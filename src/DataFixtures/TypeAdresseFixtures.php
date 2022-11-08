<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\TypeAdresse;

class TypeAdresseFixtures extends Fixture implements DependentFixtureInterface
{
  const TYPEADRESSES = [
    ["name" => "de facturation"],
    ["name" => "de livraison"]
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::TYPEADRESSES as $key => $typeAdresse) {
      $name = $typeAdresse['name'];
      $newTypeAdresse = new TypeAdresse();
      $newTypeAdresse->setName($name);
      $manager->persist($newTypeAdresse);
      $this->addReference('typeAdresse_' . ($key + 1), $newTypeAdresse);
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
