<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends Fixture implements DependentFixtureInterface
{
  const CATEGORYS = [
    ["name" => "Plantes"],
    ["name" => "Qi Gong"],
    ["name" => "Méditations"],
    ["name" => "Ateliers"],
    ["name" => "Stages"],
    ["name" => "Balades"]
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::CATEGORYS as $key => $category) {
      $name = $category['name'];
      $newCategory = new Category();
      $newCategory->setName($name);
      $manager->persist($newCategory);
      $this->addReference('category_' . ($key + 1), $newCategory);
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
    ];
  }
}
