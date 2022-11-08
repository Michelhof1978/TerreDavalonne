<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;
use App\Entity\ProductImage;
use App\Entity\ProductOption;
use DateTimeImmutable;
use Faker;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
  const PRODUCTS = [
    [
      "name" => "Serpolette",
      "presentation" => "petite présenation du produit Serpolette",
      "reference" => "65169896",
      "description" => "kjhlkjqsdf lkjhqfdslkj s",
      "poids" => 10.5,
      "price" => 45,
      "category" => 1,
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "3",
      "created_at" => "09/06/2022",
      "imageHeader" => "https://img.freepik.com/photos-gratuite/femme-priant-oiseau-libre-profitant-nature-fond-coucher-soleil-notion-espoir_34200-256.jpg?w=2000",
    ],
    [
      "name" => "Plantain",
      "presentation" => "petite présenation du produit Plantain",
      "reference" => "65198561",
      "description" => "kjqsdhflkj hqsdjfhkjhgsdf lkjh l",
      "poids" => 14,
      "price" => 50,
      "category" => 1,
      "elementBase" => "2",
      "elementPhyto" => "2",
      "elementSabbat" => "2",
      "created_at" => "09/06/2022",
      "imageHeader" => "https://img.freepik.com/photos-gratuite/femme-priant-oiseau-libre-profitant-nature-fond-coucher-soleil-notion-espoir_34200-256.jpg?w=2000",
    ],
    [
      "name" => "Pissenlit",
      "presentation" => "petite présenation du produit Pissenlit",
      "reference" => "31659161",
      "description" => "mkqfslqkj hqsldfjhljsdf lkjhdfqskjhirue",
      "poids" => 25,
      "price" => 12,
      "category" => 1,
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "1",
      "created_at" => "09/06/2022",
      "imageHeader" => "https://img.freepik.com/photos-gratuite/femme-priant-oiseau-libre-profitant-nature-fond-coucher-soleil-notion-espoir_34200-256.jpg?w=2000",
    ],
    [
      "name" => "Lierre Terrestre",
      "presentation" => "petite présenation du produit Lierre Terrestre",
      "reference" => "16595913",
      "description" => "qlskdflkjk qdskjfhhjg sdfjhgk",
      "poids" => 12.5,
      "price" => 60,
      "category" => 1,
      "elementBase" => "4",
      "elementPhyto" => "2",
      "elementSabbat" => "8",
      "created_at" => "09/06/2022",
      "imageHeader" => "https://img.freepik.com/photos-gratuite/femme-priant-oiseau-libre-profitant-nature-fond-coucher-soleil-notion-espoir_34200-256.jpg?w=2000",
    ],
    [
      "name" => "Trefle",
      "presentation" => "petite présenation du produit Trefle",
      "reference" => "12356110",
      "description" => "kjdflk qsdfjkh jhfd lkjh",
      "poids" => 15.5,
      "price" => 10,
      "category" => 1,
      "elementBase" => "5",
      "elementPhyto" => "2",
      "elementSabbat" => "7",
      "created_at" => "09/06/2022",
      "imageHeader" => "https://img.freepik.com/photos-gratuite/femme-priant-oiseau-libre-profitant-nature-fond-coucher-soleil-notion-espoir_34200-256.jpg?w=2000",
    ],
    [
      "name" => "1 h coaching Qi Gong",
      "presentation" => "petite présenation du produit 1 heure de coaching Qi Gong",
      "reference" => "12356111",
      "description" => "4 x 1/4 heure de coaching, à réserver au fil de votre formation",
      "poids" => 0,
      "price" => 90,
      "category" => 2,
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "3",
      "created_at" => "05/07/2022",
      "imageHeader" => "https://img.freepik.com/photos-gratuite/femme-priant-oiseau-libre-profitant-nature-fond-coucher-soleil-notion-espoir_34200-256.jpg?w=2000",
    ],
    [
      "name" => "2 h coaching Qi Gong",
      "presentation" => "petite présenation du produit 2 heures coaching Qi Gong",
      "reference" => "12356112",
      "description" => "8 x 1/4 heure de coaching, à réserver au fil de votre formation",
      "poids" => 0,
      "price" => 120,
      "category" => 2,
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "3",
      "created_at" => "05/07/2022",
      "imageHeader" => "https://img.freepik.com/photos-gratuite/femme-priant-oiseau-libre-profitant-nature-fond-coucher-soleil-notion-espoir_34200-256.jpg?w=2000",
    ],
    [
      "name" => "3 h coaching Qi Gong",
      "presentation" => "petite présenation du produit 3 heures coaching Qi Gong",
      "reference" => "12356113",
      "description" => "13 x 1/4 heure de coaching, à réserver au fil de votre formation",
      "poids" => 0,
      "price" => 150,
      "category" => 2,
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "3",
      "created_at" => "05/07/2022",
      "imageHeader" => "https://img.freepik.com/photos-gratuite/femme-priant-oiseau-libre-profitant-nature-fond-coucher-soleil-notion-espoir_34200-256.jpg?w=2000",
    ]
  ];

  public function load(ObjectManager $manager)
  {
    $faker = Faker\Factory::create('fr_FR');
    $faker->addProvider(new \App\Faker\Provider\PicsumImage($faker));

    foreach (self::PRODUCTS as $key => $product) {
      $name = $product['name'];
      $presentation = $product['presentation'];
      $reference = $product['reference'];
      $description = $product['description'];
      $poids = $product['poids'];
      $price = $product['price'];
      $category = $product['category'];
      $imageHeader = $product['imageHeader'];
      $day = substr($product['created_at'], 0, 2);
      $month = substr($product['created_at'], 3, 2);
      $year = substr($product['created_at'], 6, 4);
      $dateCreation = new DateTimeImmutable();
      $dateCreation->setDate($year, $month, $day);
      $elementBase = $product['elementBase'];
      $elementPhyto = $product['elementPhyto'];
      $elementSabbat = $product['elementSabbat'];
      $newProduct = new Product();
      $newProduct->setName($name);
      $newProduct->setPresentation($presentation);
      $newProduct->setReference($reference);
      $newProduct->setDescription($description);
      $newProduct->setPoids($poids);
      $newProduct->setPrice($price);
      $newProduct->setCategoryId($this->getReference('category_' . $category));
      $newProduct->addElementBase($this->getReference('elementBase_' . $elementBase));
      $newProduct->addElementPhyto($this->getReference('elementPhyto_' . $elementPhyto));
      $newProduct->addElementSabbat($this->getReference('elementSabbat_' . $elementSabbat));

      for ($image = 1; $image < 6; $image++) {
        $img = $faker->image('public/images/products');
        $nomImg = basename($img);
        $imageProduct = new ProductImage();
        $imageProduct->setName($nomImg);
        $newProduct->addImage($imageProduct);
      }
      for ($option = 1; $option < 3; $option++) {
        $newOption = new ProductOption();
        $newOption->setType($this->getReference('typeoptions_' . $faker->numberBetween(1, 8)));
        $newOption->setContent($faker->realText);
        $newProduct->addOption($newOption);
      }
      $newProduct->setImageHeader($imageHeader);
      $newProduct->setCreatedAt($dateCreation);
      $manager->persist($newProduct);
      $this->addReference('product_' . ($key + 1), $newProduct);
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
    ];
  }
}
