<?php

namespace App\DataFixtures;

use App\Entity\Recette;
use App\Entity\RecetteImage;
use App\Entity\RecetteOption;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class RecetteFixtures extends Fixture implements DependentFixtureInterface
{
  const RECETTES = [
    [
      "name" => "Recette numéro 1",
      "presentation" => "petite présentation de la recette numéro 1",
      "description" => "Description de la recette numéro 1",
      "typeRecette" => 1,
      "lienPhoto" => "https://img.freepik.com/photos-gratuite/route-etroite-dans-champ-herbeux-vert-entoure-arbres-verts-soleil-eclatant-arriere-plan_181624-9968.jpg?w=2000",
      "created_at" => "02/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Recette numéro 2",
      "presentation" => "petite présentation de la recette numéro 2",
      "description" => "Description de la recette numéro 2",
      "typeRecette" => 2,
      "lienPhoto" => "https://cdn.artphotolimited.com/images/60df3a8fbd40b852ce5e0fff/300x300/red-tree.jpg",
      "created_at" => "10/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Recette numéro 3",
      "presentation" => "petite présentation de la recette numéro 3",
      "description" => "Description de la recette numéro 3",
      "typeRecette" => 1,
      "lienPhoto" => "https://images.all-free-download.com/images/graphiclarge/background_blue_clear_265915.jpg",
      "created_at" => "21/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Recette numéro 4",
      "presentation" => "petite présentation de la recette numéro 4",
      "description" => "Description de la recette numéro 4",
      "typeRecette" => 2,
      "lienPhoto" => "https://media.istockphoto.com/photos/nature-landscape-picture-id1162946429?k=20&m=1162946429&s=170667a&w=0&h=DUoS5ZW7OPfLJXIZtSnebqgR7IblgPDnLgG1UGHlOSk=",
      "created_at" => "04/07/2022",
      "update_at" => "",
    ],
    [
      "name" => "Recette numéro 5",
      "presentation" => "petite présentation de la recette numéro 5",
      "description" => "Description de la recette numéro 5",
      "typeRecette" => 3,
      "lienPhoto" => "https://thumbs.dreamstime.com/b/hand-holding-glass-globe-ball-tree-growing-green-nature-blur-background-eco-concept-161081206.jpg",
      "created_at" => "14/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Recette numéro 6",
      "presentation" => "petite présentation de la recette numéro 6",
      "description" => "Description de la recette numéro 6",
      "typeRecette" => 1,
      "lienPhoto" => "https://cdn.radiofrance.fr/s3/cruiser-production/2019/08/881666ea-f7aa-4f70-ac8a-e7384ec88fd6/1200x680_nature_gettyimages-953168856.jpg",
      "created_at" => "24/07/2022",
      "update_at" => "",
    ],
    [
      "name" => "Recette numéro 7",
      "presentation" => "petite présentation de la recette numéro 7",
      "description" => "Description de la recette numéro 7",
      "typeRecette" => 4,
      "lienPhoto" => "https://img.passeportsante.net/1200x675/2020-01-30/i93408-.webp",
      "created_at" => "28/08/2022",
      "update_at" => "",
    ],
    [
      "name" => "Recette numéro 8",
      "presentation" => "petite présentation de la recette numéro 8",
      "description" => "Description de la recette numéro 8",
      "typeRecette" => 5,
      "lienPhoto" => "https://www.widoobiz.com/wp-content/uploads/2019/05/rsz-simon-migaj-421505-unsplash-1072x568.jpg",
      "created_at" => "03/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Recette numéro 9",
      "presentation" => "petite présentation de la recette numéro 9",
      "description" => "Description de la recette numéro 9",
      "typeRecette" => 6,
      "lienPhoto" => "https://static.vecteezy.com/ti/photos-gratuite/p3/1226152-moraine-lac-au-coucher-du-soleil-gratuit-photo.jpeg",
      "created_at" => "04/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Recette numéro 10",
      "presentation" => "petite présentation de la recette numéro 10",
      "description" => "Description de la recette numéro 10",
      "typeRecette" => 1,
      "lienPhoto" => "https://media.istockphoto.com/photos/landscape-sunset-view-of-morain-lake-and-mountain-range-picture-id514773355?k=20&m=514773355&s=170667a&w=0&h=78p_CQzBOD9gBKoOUBp7x9Cv2yttfKzSRrHWowkvaNs=",
      "created_at" => "05/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Recette numéro 11",
      "presentation" => "petite présentation de la recette numéro 11",
      "description" => "Description de la recette numéro 11",
      "typeRecette" => 2,
      "lienPhoto" => "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/24701-nature-natural-beauty.jpg/1280px-24701-nature-natural-beauty.jpg",
      "created_at" => "06/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Recette numéro 12",
      "presentation" => "petite présentation de la recette numéro 12",
      "description" => "Description de la recette numéro 12",
      "typeRecette" => 4,
      "lienPhoto" => "https://www.holland.com/upload_mm/9/8/d/68961_fullimage_de-natuurgebieden-van-nederland.jpg",
      "created_at" => "07/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Recette numéro 13",
      "presentation" => "petite présentation de la recette numéro 13",
      "description" => "Description de la recette numéro 13",
      "typeRecette" => 5,
      "lienPhoto" => "https://www.lepointdufle.net/ia/nature2.jpg",
      "created_at" => "08/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Recette numéro 14",
      "presentation" => "petite présentation de la recette numéro 14",
      "description" => "Description de la recette numéro 14",
      "typeRecette" => 6,
      "lienPhoto" => "https://img.freepik.com/photos-gratuite/femme-priant-oiseau-libre-profitant-nature-fond-coucher-soleil-notion-espoir_34200-256.jpg?w=2000",
      "created_at" => "09/06/2022",
      "update_at" => "",
    ]
  ];

  public function load(ObjectManager $manager)
  {
    $faker = Faker\Factory::create('fr_FR');
    $faker->addProvider(new \App\Faker\Provider\PicsumImage($faker));
    foreach (self::RECETTES as $key => $recette) {
      $nom = $recette['name'];
      $presentation = $recette['presentation'];
      $description = $recette['description'];
      $typeRecette = $recette['typeRecette'];
      $lienPhoto = $recette['lienPhoto'];
      $day = substr($recette['created_at'], 0, 2);
      $month = substr($recette['created_at'], 3, 2);
      $year = substr($recette['created_at'], 6, 4);
      $dateCreation = new DateTimeImmutable();
      $dateCreation->setDate($year, $month, $day);
      $update_at = $recette['update_at'];
      $newRecette = new Recette();
      $newRecette->setName($nom);
      $newRecette->setPresentation($presentation);
      $newRecette->setDescription($description);

      for($image = 1; $image <6; $image++){
        $img = $faker->image('public/images/recettes');
        $nomImg = basename($img);
        $imageRecette = new RecetteImage();
        $imageRecette->setName($nomImg);
        $newRecette->addImage($imageRecette);
      }
      for($option = 1; $option <3; $option++){
        $newOption = new RecetteOption();
        $newOption->setType($this->getReference('typeoptions_' . $faker->numberBetween(1,8)));
        $newOption->setContent($faker->realText);
        $newRecette->addOption($newOption);
      }

      $newRecette->setTypeRecette($this->getReference('recetteType_' . $typeRecette));
      $newRecette->setLienPhoto($lienPhoto);
      $newRecette->setCreatedAt($dateCreation);
      $manager->persist($newRecette);
      $this->addReference('recette_' . ($key + 1), $newRecette);
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
