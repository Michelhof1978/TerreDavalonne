<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Stock;
use DateTime;
use DateTimeImmutable;

class StockFixtures extends Fixture implements DependentFixtureInterface
{
  const STOCKS = [
    ["datemouvement" => "25/04/2022",
     "sensmouvement" => 1,
     "quantity" => 5,
     "libelle" => "stock initial",
     "product" => 1],
    ["datemouvement" => "26/04/2022",
     "sensmouvement" => 2,
     "quantity" => 2,
     "libelle" => "commande numero 1",
     "product" => 1],
    ["datemouvement" => "27/04/2022",
     "sensmouvement" => 1,
     "quantity" => 5,
     "libelle" => "facture numero 135165",
     "product" => 1],
    ["datemouvement" => "25/04/2022",
     "sensmouvement" => 1,
     "quantity" => 5,
     "libelle" => "stock initial",
     "product" => 2],
    ["datemouvement" => "26/04/2022",
     "sensmouvement" => 1,
     "quantity" => 5,
     "libelle" => "facture numero 651891",
     "product" => 2],
    ["datemouvement" => "27/04/2022",
     "sensmouvement" => 2,
     "quantity" => 5,
     "libelle" => "commande numero 2",
     "product" => 2],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::STOCKS as $key => $stock) {
      $day = substr($stock['datemouvement'], 0, 2);
      $month = substr($stock['datemouvement'], 3, 2);
      $year = substr($stock['datemouvement'], 6, 4);
      $dateMouvement = new DateTime();
      $dateMouvement->setDate($year, $month, $day);
      $sensMouvement = $stock['sensmouvement'];
      $quantity = $stock['quantity'];
      $libelle = $stock['libelle'];
      $product = $stock['product'];
      $newStock = new Stock();
      $newStock->setDateMouvement($dateMouvement);
      $newStock->setSensMouvement($sensMouvement);
      $newStock->setQuantity($quantity);
      $newStock->setLibelle($libelle);
      $newStock->setProduct($this->getReference('product_' . $product));
      $manager->persist($newStock);
      $this->addReference('stock_' . ($key + 1), $newStock);
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
    ];
  }
}
