<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\BlocContentAttachement;
use App\Entity\Commande;
use App\Entity\OrderLigne;

class OrderLigneFixtures extends Fixture implements DependentFixtureInterface
{
  const ORDERLIGNES = [
    ["quantity" => 1,
     "product" => 1,
     "commande" => 1],
     ["quantity" => 2,
     "product" => 2,
     "commande" => 1],
     ["quantity" => 1,
     "product" => 1,
     "commande" => 2],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::ORDERLIGNES as $key => $ligne) {
      $quantity = $ligne['quantity'];
      $product = $ligne['product'];
      $commande = $ligne['commande'];
      $newLigne = new OrderLigne();
      $newLigne->setQuantity($quantity);
      $newLigne->setProduct($this->getReference('product_' . $product));
      $newLigne->setCommande($this->getReference('commande_' . $commande));
      $manager->persist($newLigne);
      $this->addReference('ligne_' . ($key + 1), $newLigne);
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
      CommandeFixtures::class
    ];
  }
}
