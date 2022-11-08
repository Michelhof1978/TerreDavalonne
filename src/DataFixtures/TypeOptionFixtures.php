<?php

namespace App\DataFixtures;

use App\Entity\Recette;
use App\Entity\TypeOptions;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TypeOptionFixtures extends Fixture implements DependentFixtureInterface
{
  const TYPEOPTIONS = [
    ["name" => "Préparation"],
    ["name" => "Ingrédients"],
    ["name" => "Atelier"],
    ["name" => "Tradition"],
    ["name" => "Rituel"],
    ["name" => "Recette"],
    ["name" => "Bricolage"],
    ["name" => "Ogham"],
    ["name" => "Partie utile"],
    ["name" => "Précaution d'emploi"],
    ["name" => "Propriété médicinale"],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::TYPEOPTIONS as $key => $typeOption) {
      $nom = $typeOption['name'];
      $newTypeOptions = new TypeOptions();
      $newTypeOptions->setName($nom);
      $manager->persist($newTypeOptions);
      $this->addReference('typeoptions_' . ($key + 1), $newTypeOptions);
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
    ];
  }
}
