<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\FAQCoaching;

class FAQCoachingFixtures extends Fixture implements DependentFixtureInterface
{
  const FAQCOACHINGS = [
    ["question" => "Pourquoi ?",
     "response" => "il n'est jamais simple de se former soi même alors de temps en temps il est bon d'avoir une vision extérieur de la part de son formateur."],
    ["question" => "Le principe",
     "response" => "Ainsi, je vous offre la possibiliter de nous retrouver pour un moment seul à seul afin de faire le point sur votre pratique et vous permettre de corriger vos postures."],
    ["question" => "Benefices :",
     "response" => "Grace à ce temps qui vous est dédié, vous pourrez corriger vos erreurs de posture et ainsi repartir sur de bonnes bases pour accroitre les bienfaits du Qi Gong."]
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::FAQCOACHINGS as $key => $faqCoaching) {
      $question = $faqCoaching['question'];
      $response = $faqCoaching['response'];
      $newFaqCoaching = new FAQCoaching();
      $newFaqCoaching->setQuestion($question);
      $newFaqCoaching->setReponse($response);
      $manager->persist($newFaqCoaching);
      $this->addReference('faqCoaching_' . ($key + 1), $newFaqCoaching);
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
      CommentFixtures::class,
      ConditionGDVFixtures::class,
      HypnoseFixtures::class,
      ParamGenFixtures::class,
      PolitiqueDCFixtures::class,
      QuiSommesNousFixtures::class,
      ConseilsDNFixtures::class,
      RecueilFixtures::class,
      PlanteFixtures::class,
    ];
  }
}
