<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Type;

class TypeFixtures extends Fixture implements DependentFixtureInterface
{
  const TYPES = [
    ["name" => "stage botanique"],
    ["name" => "stage Qi Gong"],
    ["name" => "balade Botanique"],
    ["name" => "atelier"],
    ["name" => "formation numéric"],
    ["name" => "coaching botanique"],
    ["name" => "coaching Qi Gong"]
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::TYPES as $key => $type) {
      $name = $type['name'];
      $newType = new Type();
      $newType->setName($name);
      $manager->persist($newType);
      $this->addReference('type_' . ($key + 1), $newType);
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
      TypeAdresseFixtures::class,
      CategoryFixtures::class,
      FAQFixtures::class,
    ];
  }
}
