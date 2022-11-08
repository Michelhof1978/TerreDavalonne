<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Promotion;
use DateTime;
use DateTimeImmutable;

class PromotionFixtures extends Fixture implements DependentFixtureInterface
{
  const PROMOTIONS = [
    ["dateDebutPromo" => "27/04/2022",
     "dateFinPromo" => "30/04/2022",
     "reduction" => 5],
     ["dateDebutPromo" => "01/05/2022",
     "dateFinPromo" => "15/05/2022",
     "reduction" => 7],
     ["dateDebutPromo" => "16/05/2022",
     "dateFinPromo" => "31/05/2022",
     "reduction" => 10]
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::PROMOTIONS as $key => $promotion) {
      $dateCreation1 = new DateTime('now');
      $day = substr($dateCreation1->format('Y-m-d'), 0, 2);
      $month = substr($dateCreation1->format('Y-m-d'), 3, 2);
      $year = substr($dateCreation1->format('Y-m-d'), 6, 4);
      $dateCreation = new DateTimeImmutable();
      $dateCreation->setDate(intval($year), intval($month), intval($day));
      $day = substr($promotion['dateDebutPromo'], 0, 2);
      $month = substr($promotion['dateDebutPromo'], 3, 2);
      $year = substr($promotion['dateDebutPromo'], 6, 4);
      $dateDebutPromo = new DateTime();
      $dateDebutPromo->setDate($year, $month, $day);
      $day = substr($promotion['dateFinPromo'], 0, 2);
      $month = substr($promotion['dateFinPromo'], 3, 2);
      $year = substr($promotion['dateFinPromo'], 6, 4);
      $dateFinPromo = new DateTime();
      $dateFinPromo->setDate($year, $month, $day);
      $reduction = $promotion['reduction'];
      $newPromotion = new Promotion();
      $newPromotion->setCreatedAt($dateCreation);
      $newPromotion->setDateDebutPromo($dateDebutPromo);
      $newPromotion->setDateFinPromo($dateFinPromo);
      $newPromotion->setPercentPromo($reduction);
      $manager->persist($newPromotion);
      $this->addReference('promotion_' . ($key + 1), $newPromotion);
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
    ];
  }
}
