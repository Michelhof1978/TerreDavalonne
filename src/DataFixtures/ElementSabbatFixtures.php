<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\ElementSabbat;
use DateTime;

class ElementSabbatFixtures extends Fixture implements DependentFixtureInterface
{
  const ELEMENTSABBATS = [
    ["name" => "Yule", "dateDebut" => "19/12/2022", "dateFin" => "23/12/2022"],
    ["name" => "Imbolc", "dateDebut" => "01/02/2022", "dateFin" => "02/02/2022"],
    ["name" => "Ostara", "dateDebut" => "19/03/2022", "dateFin" => "23/03/2022"],
    ["name" => "Beltane", "dateDebut" => "30/04/2022", "dateFin" => "01/05/2022"],
    ["name" => "Litha", "dateDebut" => "19/06/2022", "dateFin" => "23/06/2022"],
    ["name" => "Lughnasadh", "dateDebut" => "01/08/2022", "dateFin" => "02/08/2022"],
    ["name" => "Mabon", "dateDebut" => "20/07/2022", "dateFin" => "24/07/2022"],
    ["name" => "Samhain", "dateDebut" => "31/10/2022", "dateFin" => "01/11/2022"]
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::ELEMENTSABBATS as $key => $elementSabbat) {
      $name = $elementSabbat['name'];
      $day = substr($elementSabbat['dateDebut'], 0, 2);
      $month = substr($elementSabbat['dateDebut'], 3, 2);
      $year = substr($elementSabbat['dateDebut'], 6, 4);
      $dateDebutSabbat = new DateTime();
      $dateDebutSabbat->setDate($year, $month, $day);
      $day = substr($elementSabbat['dateFin'], 0, 2);
      $month = substr($elementSabbat['dateFin'], 3, 2);
      $year = substr($elementSabbat['dateFin'], 6, 4);
      $dateFinSabbat = new DateTime();
      $dateFinSabbat->setDate($year, $month, $day);
      $newElementSabbat = new ElementSabbat();
      $newElementSabbat->setName($name);
      $newElementSabbat->setDatedebutsabbat($dateDebutSabbat);
      $newElementSabbat->setDatefinsabbat($dateFinSabbat);
      $manager->persist($newElementSabbat);
      $this->addReference('elementSabbat_' . ($key + 1), $newElementSabbat);
    }

    $manager->flush();
  }

  public function getDependencies()
  {
    return [
      ElementBaseFixtures::class,
      ElementPhytoFixtures::class,
    ];
  }
}
