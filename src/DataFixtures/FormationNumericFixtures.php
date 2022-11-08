<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\FormationNumeric;

class FormationNumericFixtures extends Fixture implements DependentFixtureInterface
{
  const FORMATIONNUMERICS = [
    ["name" => "Formation numérique 1", "lienVideo" => "https://www.youtube.com/watch?v=wYa6LuUGKRc", "price" => 45, "type" => 5],
    ["name" => "Formation numérique 2", "lienVideo" => "https://www.youtube.com/watch?v=gqWL6FazTko", "price" => 85, "type" => 5],
    ["name" => "Formation numérique 3", "lienVideo" => "https://www.youtube.com/watch?v=XAAlWBhOqDg", "price" => 70.5, "type" => 5],
    ["name" => "Formation numérique 4", "lienVideo" => "https://www.youtube.com/watch?v=y2RAEnWreoE", "price" => 45, "type" => 5],
    ["name" => "Formation numérique 5", "lienVideo" => "https://www.youtube.com/watch?v=cwlvTcWR3Gs", "price" => 85, "type" => 5],
    ["name" => "Formation numérique 6", "lienVideo" => "https://www.youtube.com/watch?v=bgfxk6kBbm0", "price" => 120.5, "type" => 5],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::FORMATIONNUMERICS as $key => $formationNumeric) {
      $name = $formationNumeric['name'];
      $lienVideo = $formationNumeric['lienVideo'];
      $price = $formationNumeric['price'];
      $type = $formationNumeric['type'];
      $newFormationNumeric = new FormationNumeric();
      $newFormationNumeric->setName($name);
      $newFormationNumeric->setLienVideo($lienVideo);
      $newFormationNumeric->setPrice($price);
      $newFormationNumeric->setType($this->getReference('type_' . $type));
      $manager->persist($newFormationNumeric);
      $this->addReference('formationNumeric_' . ($key + 1), $newFormationNumeric);
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
    ];
  }
}
