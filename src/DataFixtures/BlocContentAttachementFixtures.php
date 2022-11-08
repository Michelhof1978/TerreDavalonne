<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\BlocContentAttachement;

class BlocContentAttachementFixtures extends Fixture implements DependentFixtureInterface
{
  const BLOCCONTENTATTACHEMENTS = [
    ["path" => "/public/build",
     "size" => 150,
     "extention" => "jpg",
     "lien" => "https://www.francefleursblog.com/wp-content/uploads/2019/10/chris-lee-654655-unsplash-1-e1572273272834-750x563.jpg",
     "blocContentId" => 1],
     ["path" => "/public/build",
     "size" => 250,
     "extention" => "png",
     "lien" => "https://cdn.laredoute.com/products/6/b/6/6b6095d256765d484591810785059354.jpg?imgopt=twic&twic=v1/cover=700x700",
     "blocContentId" => 1],
     ["path" => "/public/build",
     "size" => 250,
     "extention" => "jpg",
     "lien" => "https://www.francefleursblog.com/wp-content/uploads/2019/10/chris-lee-654655-unsplash-1-e1572273272834-750x563.jpg",
     "blocContentId" => 1],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::BLOCCONTENTATTACHEMENTS as $key => $blocContentAttachement) {
      $path = $blocContentAttachement['path'];
      $size = $blocContentAttachement['size'];
      $extention = $blocContentAttachement['extention'];
      $lien = $blocContentAttachement['lien'];
      $blocContentId = $blocContentAttachement['blocContentId'];
      $newBlocContentAttachement = new BlocContentAttachement();
      $newBlocContentAttachement->setPath($path);
      $newBlocContentAttachement->setSize($size);
      $newBlocContentAttachement->setExtention($extention);
      $newBlocContentAttachement->setLien($lien);
      $newBlocContentAttachement->setBlocContentId($this->getReference('blocContent_' . $blocContentId));
      $manager->persist($newBlocContentAttachement);
      $this->addReference('blocContentAttachement_' . ($key + 1), $newBlocContentAttachement);
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
      ConfigBlocFixtures::class,
      SectionFixtures::class,
      BlocContentFixtures::class
    ];
  }
}
