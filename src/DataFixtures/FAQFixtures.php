<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\FAQ;

class FAQFixtures extends Fixture implements DependentFixtureInterface
{
  const FAQS = [
    ["question" => "les poduits ont-ils des dates de péremption ?",
     "response" => "Oui, mais les dates sont assés longues."],
    ["question" => "Les stages comprennents-ils l'hébergement ?",
     "response" => "Nous ne logeons pas directement, mais nous pouvons vous fournir une liste des hébergements les plus proches et en fonction de se que vous cherchez."],
    ["question" => "Sous quel délai peut-on avoir les produits ?",
     "response" => "Il faut compté entre une et deux semaines à partir de la validation de votre commande."],
    ["question" => "Faut-il des équipements spéciaux pour le Qi Gong ?",
     "response" => "Non, pas de matériel particulier, juste une tenue de sport dans laquelle vous vous sentez bien."],
    ["question" => "J'ai annulé ma participation à un stage, sous quel delai vais-je être remboursé ?",
     "response" => "Il faut compter un délai de 3 jours."],
    ["question" => "Faut-il un justificatif médical pour annuler un stage ?",
     "response" => "Non, pas necessairement, tant que vous êtes dans le délai de rétractation, mais ensuite, si vous voulez récuperer l'ensemble de votre réservation, sinon nous gardons 20% car il est peu probable de trouver un nouveau stagiaire."]
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::FAQS as $key => $faq) {
      $question = $faq['question'];
      $response = $faq['response'];
      $newFaq = new FAQ();
      $newFaq->setQuestion($question);
      $newFaq->setResponse($response);
      $manager->persist($newFaq);
      $this->addReference('faq_' . ($key + 1), $newFaq);
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
    ];
  }
}
