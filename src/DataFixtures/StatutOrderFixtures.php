<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\StatutOrder;

class StatutOrderFixtures extends Fixture implements DependentFixtureInterface
{
  const STATUTODERS = [
    ["name" => "en attente de traitement"],
    ["name" => "en cours de traitement"],
    ["name" => "traitée"],
    ["name" => "expediée"],
    ["name" => "livrée"]
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::STATUTODERS as $key => $statutOrder) {
      $name = $statutOrder['name'];
      $newStatutOrder = new StatutOrder();
      $newStatutOrder->setName($name);
      $manager->persist($newStatutOrder);
      $this->addReference('statutOrder_' . ($key + 1), $newStatutOrder);
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
    ];
  }
}
