<?php

namespace App\DataFixtures;

use App\DataFixtures\CommandeFixtures as DataFixturesCommandeFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\GoldBook;
use DateTimeImmutable;

class GoldBookFixtures extends Fixture implements DependentFixtureInterface
{
  const MESSAGES = [
    ["comment" => "bonjour, kjlqbl qsdjfh sfqlkj jkb",
     "date" => "23/05/2022",
     "isValid" => 0,
     "user" => 2],
     ["comment" => "bonjour, kjlqbl qsdjfh sfqlkj jkb",
     "date" => "24/05/2022",
     "isValid" => 0,
     "user" => 2],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::MESSAGES as $key => $message) {
      $comment = $message['comment'];
      $day = substr($message['date'], 0, 2);
      $month = substr($message['date'], 3, 2);
      $year = substr($message['date'], 6, 4);
      $dateCreation = new DateTimeImmutable();
      $dateCreation->setDate($year, $month, $day);
      $isValid = $message['isValid'];
      $user = $message['user'];
      $newMessage = new GoldBook();
      $newMessage->setComment($comment);
      $newMessage->setCreatedAt($dateCreation);
      $newMessage->setIsValid($isValid);
      $newMessage->setUserId($this->getReference('user_' . $user));
      $manager->persist($newMessage);
      $this->addReference('goldbook_' . ($key + 1), $newMessage);
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
      UserFixtures::class,
      CommandeFixtures::class,
      OrderLigneFixtures::class
    ];
  }
}
