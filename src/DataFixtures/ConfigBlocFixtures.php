<?php

namespace App\DataFixtures;

use App\DataFixtures\TypeBlocFixtures as DataFixturesTypeBlocFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ConfigBloc;

class ConfigBlocFixtures extends Fixture implements DependentFixtureInterface
{
  const CONFIGBLOCS = [
    ["hauteur" => 50, "longueur" => 50, "radius" => 25],
    ["hauteur" => 50, "longueur" =>  50, "radius" => 25],
    ["hauteur" => 100, "longueur" =>  100, "radius" => null],
    ["hauteur" => 100, "longueur" =>  100, "radius" => null],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::CONFIGBLOCS as $key => $configBloc) {
      $hauteur = $configBloc['hauteur'];
      $longueur = $configBloc['longueur'];
      $radius = $configBloc['radius'];
      $newConfigBloc = new ConfigBloc();
      $newConfigBloc->setHauteur($hauteur);
      $newConfigBloc->setLongueur($longueur);
      $newConfigBloc->setRadius($radius);
      $manager->persist($newConfigBloc);
      $this->addReference('configBloc_' . ($key + 1), $newConfigBloc);
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
    ];
  }
}
