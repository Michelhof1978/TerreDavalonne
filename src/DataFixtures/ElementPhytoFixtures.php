<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\ElementPhyto;

class ElementPhytoFixtures extends Fixture implements DependentFixtureInterface
{
  const ELEMENTPHYTOS = [
    ["name" => "Digestif", "parentPhyto" => null],
    ["name" => "Foie", "parentPhyto" => 1],
    ["name" => "Estomac", "parentPhyto" => 1],
    ["name" => "Intestin", "parentPhyto" => 1],
    ["name" => "Orl Allergie", "parentPhyto" => null],
    ["name" => "Bouche", "parentPhyto" => 5],
    ["name" => "Bronche", "parentPhyto" => 5],
    ["name" => "Gorge", "parentPhyto" => 5],
    ["name" => "Oreilles", "parentPhyto" => 5],
    ["name" => "Poumons", "parentPhyto" => 5],
    ["name" => "Sinus", "parentPhyto" => 5],
    ["name" => "Protection Immunitaire", "parentPhyto" => null],
    ["name" => "Booster l'imminité", "parentPhyto" => 12],
    ["name" => "Fatigue", "parentPhyto" => 12],
    ["name" => "Nerveux", "parentPhyto" => null],
    ["name" => "Dépression", "parentPhyto" => 15],
    ["name" => "Migraine", "parentPhyto" => 15],
    ["name" => "Sommeil", "parentPhyto" => 15],
    ["name" => "Stress", "parentPhyto" => 15],
    ["name" => "Femme", "parentPhyto" => null],
    ["name" => "Jeune", "parentPhyto" => 20],
    ["name" => "Adulte", "parentPhyto" => 20],
    ["name" => "Ménopausé", "parentPhyto" => 20],
    ["name" => "Homme", "parentPhyto" => null],
    ["name" => "Sport", "parentPhyto" => 24],
    ["name" => "Prostate", "parentPhyto" => 24],
    ["name" => "Cutané", "parentPhyto" => null],
    ["name" => "Boutons", "parentPhyto" => 27],
    ["name" => "Plaies", "parentPhyto" => 27],
    ["name" => "Infections", "parentPhyto" => 27],
    ["name" => "Brûlures", "parentPhyto" => 27],
    ["name" => "Beauté & Bien être", "parentPhyto" => 27],
    ["name" => "H. Circulatoire", "parentPhyto" => null],
    ["name" => "Jambes lourdes", "parentPhyto" => 33],
    ["name" => "Métabolique", "parentPhyto" => null],
    ["name" => "Cholesterol", "parentPhyto" => 35],
    ["name" => "Diabète", "parentPhyto" => 36],
    ["name" => "Surpoids", "parentPhyto" => 36],
    ["name" => "Urinaire", "parentPhyto" => 35],
    ["name" => "Reins", "parentPhyto" => 40],
    ["name" => "Vessie", "parentPhyto" => 40],
    ["name" => "Ostéo Articulaire", "parentPhyto" => null],
    ["name" => "Articulations", "parentPhyto" => 43],
    ["name" => "Muscles", "parentPhyto" => 43],
    ["name" => "Os", "parentPhyto" => 43],
    ["name" => "Les adaptogènes", "parentPhyto" => null],
    ["name" => "Nerveux", "parentPhyto" => 47],
    ["name" => "Immunitaire", "parentPhyto" => 47],
    ["name" => "Endocrinien", "parentPhyto" => 47],
    ["name" => "Détox", "parentPhyto" => null],
    ["name" => "Diététique", "parentPhyto" => 51],
    ["name" => "Vitamines & Minéraux", "parentPhyto" => 51],
    ["name" => "Compléments Alimentaires", "parentPhyto" => 51],
    ["name" => "Huiles Essentielles", "parentPhyto" => 51],
    ["name" => "Les Huiles Végétales", "parentPhyto" => 51],
    ["name" => "Les Plantes Comestibles", "parentPhyto" => null],
    ["name" => "Les Plantes Protégées", "parentPhyto" => 57],
    ["name" => "Les Plantes Toxiques", "parentPhyto" => 57],
    ["name" => "Les Arbres", "parentPhyto" => null],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::ELEMENTPHYTOS as $key => $elementPhyto) {
      $name = $elementPhyto['name'];
      $parentPhyto = $elementPhyto['parentPhyto'];
      $newElementPhyto = new ElementPhyto();
      $newElementPhyto->setName($name);
      //$newElementPhyto->setParentPhyto($this->getReference('elementPhyto_' . $parentPhyto));
      $manager->persist($newElementPhyto);
      $this->addReference('elementPhyto_' . ($key + 1), $newElementPhyto);
    }

    $manager->flush();
  }

  public function getDependencies()
  {
    return [
      ElementBaseFixtures::class,
    ];
  }
}
