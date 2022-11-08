<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\TypeRecueil;

class TypeRecueilFixtures extends Fixture implements DependentFixtureInterface
{
  const TYPERECUEILS = [
    ["name" => "Dico Botanique"],
    ["name" => "Histoires Botaniques"]
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::TYPERECUEILS as $key => $typeRecueil) {
      $name = $typeRecueil['name'];
      $newTypeRecueil = new TypeRecueil();
      $newTypeRecueil->setName($name);
      $manager->persist($newTypeRecueil);
      $this->addReference('typeRecueil_' . ($key + 1), $newTypeRecueil);
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
    ];
  }
}
