<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Commande;
use DateTime;

class CommandeFixtures extends Fixture implements DependentFixtureInterface
{
  const COMMANDES = [
    ["date" => "20/05/22",
     "statut" => 1,
     "user" => 2],
     ["date" => "21/05/22",
     "statut" => 1,
     "user" => 2],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::COMMANDES as $key => $commande) {
      $day = substr($commande['date'], 0, 2);
      $month = substr($commande['date'], 3, 2);
      $year = substr($commande['date'], 6, 4);
      $dateCreation = new DateTime();
      $dateCreation->setDate($year, $month, $day);
      $statut = $commande['statut'];
      $user = $commande['user'];
      $newCommande = new Commande();
      $newCommande->setCreatedAt($dateCreation);
      $newCommande->setStatut($this->getReference('statutOrder_' . $statut));
      $newCommande->setUser($this->getReference('user_' . $user));
      $manager->persist($newCommande);
      $this->addReference('commande_' . ($key + 1), $newCommande);
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
      BlocContentFixtures::class,
      BlocContentAttachementFixtures::class,
      UserFixtures::class
    ];
  }
}
