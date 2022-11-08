<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Evenement;
use DateTime;

class EvenementFixtures extends Fixture implements DependentFixtureInterface
{
  const EVENEMENTS = [
    ["name" => "stage botanique",
     "numberPlace" => 10,
     "datecreation" => "26/04/2022",
     "dateDebutEvent" => "01/06/2022",
     "dateFinEvent" => "10/06/2022",
     "presentation" => "Présentation du stage botanique",
     "lienPhoto" => "https://festival-kokopelli.fr/wp-content/uploads/2020/03/Balade_Eric_Escoffier-web-01.jpg",
     "price" => 45,
     "type" => 1,
     "description" => "voici le premier événement",
     "elementbases" => [1],
     "elementPhytos" => [1],
     "elementSabbats" => [2],
    ],
    ["name" => "stage Qi Gong",
     "numberPlace" => 8,
     "datecreation" => "26/04/2022",
     "dateDebutEvent" => "11/06/2022",
     "dateFinEvent" => "20/06/2022",
     "presentation" => "Présentation du stage Qi Gong",
     "lienPhoto" => "https://quimetao.fr/wp-content/uploads/2015/08/qg-ete-460x345.jpg",
     "price" => 85,
     "type" => 5,
     "description" => "voici le deuxième événement",
     "elementbases" => [2],
     "elementPhytos" => [3],
     "elementSabbats" => [5],
    ],
    ["name" => "Balade botanique",
     "numberPlace" => 15,
     "datecreation" => "26/04/2022",
     "dateDebutEvent" => "12/05/2022",
     "dateFinEvent" => "12/05/2022",
     "presentation" => "Présentation de la deuxième balade botanique",
     "lienPhoto" => "https://www.tela-botanica.org/wp-content/uploads/2020/06/balade-700x470.jpg",
     "price" => 70.5,
     "type" => 5,
     "description" => "voici le troisième événement",
     "elementbases" => [3],
     "elementPhytos" => [4],
     "elementSabbats" => [6],
    ],
    ["name" => "Atelier culinaire",
     "numberPlace" => 6,
     "datecreation" => "26/04/2022",
     "dateDebutEvent" => "20/05/2022",
     "dateFinEvent" => "20/05/2022",
     "presentation" => "Présentation de l'atelier culinaire",
     "lienPhoto" => "https://woody.cloudly.space/app/uploads/crt-paca/2020/09/thumbs/atelier-cuisine-chateau-de-berne-1920x1379.jpg",
     "price" => 45,
     "type" => 5,
     "description" => "voici le quatrième événement",
     "elementbases" => [4],
     "elementPhytos" => [5],
     "elementSabbats" => [7],
    ],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::EVENEMENTS as $key => $evenement) {
      $name = $evenement['name'];
      $numberPlace = $evenement['numberPlace'];
      $day = substr($evenement['datecreation'], 0, 2);
      $month = substr($evenement['datecreation'], 3, 2);
      $year = substr($evenement['datecreation'], 6, 4);
      $dateCreation = new DateTime();
      $dateCreation->setDate($year, $month, $day);
      $day = substr($evenement['dateDebutEvent'], 0, 2);
      $month = substr($evenement['dateDebutEvent'], 3, 2);
      $year = substr($evenement['dateDebutEvent'], 6, 4);
      $dateDebutEvent = new DateTime();
      $dateDebutEvent->setDate($year, $month, $day);
      $day = substr($evenement['dateFinEvent'], 0, 2);
      $month = substr($evenement['dateFinEvent'], 3, 2);
      $year = substr($evenement['dateFinEvent'], 6, 4);
      $dateFinEvent = new DateTime();
      $dateFinEvent->setDate($year, $month, $day);
      $presentation = $evenement['presentation'];
      $price = $evenement['price'];
      $type = $evenement['type'];
      $description = $evenement['description'];
      $lienPhoto = $evenement['lienPhoto'];
      $elementbases = $evenement['elementbases'];
      $elementphytos = $evenement['elementPhytos'];
      $elementsabbats = $evenement['elementSabbats'];
      $newEvenement = new Evenement();
      $newEvenement->setName($name);
      $newEvenement->setNumberPlace($numberPlace);
      $newEvenement->setLienPhoto($lienPhoto);
      $newEvenement->setDateCreation($dateCreation);
      $newEvenement->setDateDebutEvenement($dateDebutEvent);
      $newEvenement->setDateFinEvenement($dateFinEvent);
      $newEvenement->setDescription($description);
      $newEvenement->setPresentation($presentation);
      $newEvenement->setPrice($price);
      $newEvenement->setType($this->getReference('type_' . $type));
      foreach ($elementbases as $elementbase) {
        $newEvenement->addElementbase($this->getReference('elementBase_' . $elementbase));
      }
      foreach ($elementphytos as $elementphyto) {
        $newEvenement->addElementPhyto($this->getReference('elementPhyto_' . $elementphyto));
      }
      foreach ($elementsabbats as $elementsabbat) {
        $newEvenement->addElementSabbat($this->getReference('elementSabbat_' . $elementsabbat));
      }
      $manager->persist($newEvenement);
      $this->addReference('evenement_' . ($key + 1), $newEvenement);
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
    ];
  }
}
