<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\TypeBloc;

class TypeBlocFixtures extends Fixture implements DependentFixtureInterface
{
  const TYPEBLOCS = [
    ["name" => "Bannière"],
    ["name" => "video50"],
    ["name" => "video100"],
    ["name" => "image50"],
    ["name" => "image100"],
    ["name" => "carroussel"],
    ["name" => "texte50"],
    ["name" => "texte100"],
    ["name" => "imagetexte100"],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::TYPEBLOCS as $key => $typeBloc) {
      $name = $typeBloc['name'];
      $newTypeBloc = new TypeBloc();
      $newTypeBloc->setTypeName($name);
      $manager->persist($newTypeBloc);
      $this->addReference('typeBloc_' . ($key + 1), $newTypeBloc);
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
    ];
  }
}
