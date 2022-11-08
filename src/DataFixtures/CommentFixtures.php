<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\GoldBook;
use DateTimeImmutable;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
  const COMMENTAIRES = [
    [
      "comment" => "bonjour, kjlqbl qsdjfh sfqlkj jkb",
      "date" => "23/05/2022",
      "isValid" => 0,
      "user" => 2
    ],
    [
      "comment" => "bonjour, kjlqbl qsdjfh sfqlkj jkb",
      "date" => "24/05/2022",
      "isValid" => 0,
      "user" => 2
    ],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::COMMENTAIRES as $key => $comment) {
      $comment = $comment['comment'];
      //$day = substr($comment['date'], 0, 2);
      //$month = substr($comment['date'], 3, 2);
      //$year = substr($comment['date'], 6, 4);
      $dateCreation = new DateTimeImmutable();
      $dateCreation->setDate(2022, 05, 24);
      //$isValid = $comment['isValid'];
      //$user = $comment['user'];
      $newComment = new Comment();
      $newComment->setComment($comment);
      $newComment->setCreatedAt($dateCreation);
      $newComment->setIsValid(0);
      $newComment->setUser($this->getReference('user_2'));
      $manager->persist($newComment);
      $this->addReference('comment_' . ($key + 1), $newComment);
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
      OrderLigneFixtures::class,
      GoldBookFixtures::class,
    ];
  }
}
