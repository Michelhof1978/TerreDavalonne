<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\CoachingVideo;

class CoachingVideoFixtures extends Fixture implements DependentFixtureInterface
{
  const COACHINGVIDEOS = [
    ["duree" => 1, "price" => 45, "type" => 6],
    ["duree" => 2, "price" => 85, "type" => 6],
    ["duree" => 3, "price" => 120, "type" => 6],
    ["duree" => 1, "price" => 45, "type" => 7],
    ["duree" => 2, "price" => 85, "type" => 7],
    ["duree" => 3, "price" => 120, "type" => 7],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::COACHINGVIDEOS as $key => $coachingVideo) {
      $duree = $coachingVideo['duree'];
      $price = $coachingVideo['price'];
      $type = $coachingVideo['type'];
      $newCoachingVideo = new CoachingVideo();
      $newCoachingVideo->setDuree($duree);
      $newCoachingVideo->setPrice($price);
      $newCoachingVideo->setType($this->getReference('type_' . $type));
      $manager->persist($newCoachingVideo);
      $this->addReference('coachingVideo_' . ($key + 1), $newCoachingVideo);
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
    ];
  }
}
