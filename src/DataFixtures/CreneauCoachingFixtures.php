<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\CreneauCoatching;
use DateTime;
use DateTimeImmutable;
use Faker;

class CreneauCoachingFixtures extends Fixture implements DependentFixtureInterface
{
  const DATEDEPART = "10/07/2022";

  const CRENEAUS = [
     ["debut" => "08:00:00",
     "fin" => "08:15:00"],
     ["debut" => "08:20:00",
     "fin" => "08:35:00"],
     ["debut" => "08:40:00",
     "fin" => "08:55:00"],
     ["debut" => "09:00:00",
     "fin" => "09:15:00"],
     ["debut" => "09:20:00",
     "fin" => "09:35:00"],
     ["debut" => "09:40:00",
     "fin" => "09:55:00"],
    ];

  public function load(ObjectManager $manager)
  {
    $faker = Faker\Factory::create('fr_FR');
    $faker->addProvider(new \App\Faker\Provider\PicsumImage($faker));
    $day = 1;
    $d = substr(self::DATEDEPART, 0, 2);
    $month = substr(self::DATEDEPART, 3, 2);
    $year = substr(self::DATEDEPART, 6, 4);
    $dateTime = new DateTime();
    $dateTime->setDate($year, $month, $d);
    $index = 1;

    for ($creneauComposant = 0; $creneauComposant < 50; $creneauComposant++) {
      foreach (self::CRENEAUS as $key => $creneau) {
        $newCreneauCoaching = new CreneauCoatching();
        $newCreneauCoaching->setDate($dateTime);
        $heure = substr($creneau['debut'], 0, 2);
        $minute = substr($creneau['debut'], 3, 2);
        $seconde = substr($creneau['debut'], 6, 2);
        $debut = new DateTime();
        $debut->setTime($heure, $minute, $seconde);
        $newCreneauCoaching->setHeureDebut($debut);
        $heure = substr($creneau['fin'], 0, 2);
        $minute = substr($creneau['fin'], 3, 2);
        $seconde = substr($creneau['fin'], 6, 2);
        $fin = new DateTime();
        $fin->setTime($heure, $minute, $seconde);
        $newCreneauCoaching->setHeureFin($fin);
        $newCreneauCoaching->setIsFree(0);
        $manager->persist($newCreneauCoaching);
        $manager->flush();
        $this->addReference('creneauCoaching_' . ($index), $newCreneauCoaching);
        $index++;
      }
      $dateTime->modify("+1 day");
      $day++;
    }
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
      UserFixtures::class,
      CommandeFixtures::class,
      OrderLigneFixtures::class,
      GoldBookFixtures::class,
      CommentFixtures::class,
      ConditionGDVFixtures::class,
      HypnoseFixtures::class,
      ParamGenFixtures::class,
      PolitiqueDCFixtures::class,
      QuiSommesNousFixtures::class,
      ConseilsDNFixtures::class,
      RecueilFixtures::class,
      PlanteFixtures::class,
      FAQCoachingFixtures::class,
    ];
  }
}
