<?php

namespace App\DataFixtures;

use App\Entity\MagieVerteImage;
use App\Entity\MagieVerte;
use App\Entity\MagieVerteOption;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class MagieVerteFixtures extends Fixture implements DependentFixtureInterface
{
  const MAGIEVERTES = [
    [
      "name" => "Magie Verte numéro 1",
      "presentation" => "Petite présentation de la magie verte numéro 1",
      "description" => "Description de la Magie Verte numéro 1",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8ucembed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "3",
      "lienPhoto0" => "https://img.freepik.com/photos-gratuite/route-etroite-dans-champ-herbeux-vert-entoure-arbres-verts-soleil-eclatant-arriere-plan_181624-9968.jpg?w=2000",
      "created_at" => "02/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Magie Verte numéro 2",
      "presentation" => "Petite présentation de la magie verte numéro 2",
      "description" => "Description de la Magie Verte numéro 2",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8ucembed/BXbmBCt0I",
      "elementBase" => "2",
      "elementPhyto" => "2",
      "elementSabbat" => "2",
      "lienPhoto0" => "https://cdn.artphotolimited.com/images/60df3a8fbd40b852ce5e0fff/300x300/red-tree.jpg",
      "created_at" => "10/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Magie Verte numéro 3",
      "presentation" => "Petite présentation de la magie verte numéro 3",
      "description" => "Description de la Magie Verte numéro 3",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8ucembed/lygMPwUj9yU",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "1",
      "lienPhoto0" => "https://images.all-free-download.com/images/graphiclarge/background_blue_clear_265915.jpg",
      "created_at" => "21/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Magie Verte numéro 4",
      "presentation" => "Petite présentation de la magie verte numéro 4",
      "description" => "Description de la Magie Verte numéro 4",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "4",
      "elementPhyto" => "2",
      "elementSabbat" => "8",
      "lienPhoto0" => "https://media.istockphoto.com/photos/nature-landscape-picture-id1162946429?k=20&m=1162946429&s=170667a&w=0&h=DUoS5ZW7OPfLJXIZtSnebqgR7IblgPDnLgG1UGHlOSk=",
      "created_at" => "04/07/2022",
      "update_at" => "",
    ],
    [
      "name" => "Magie Verte numéro 5",
      "presentation" => "Petite présentation de la magie verte numéro 5",
      "description" => "Description de la Magie Verte numéro 5",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "5",
      "elementPhyto" => "2",
      "elementSabbat" => "7",
      "lienPhoto0" => "https://thumbs.dreamstime.com/b/hand-holding-glass-globe-ball-tree-growing-green-nature-blur-background-eco-concept-161081206.jpg",
      "created_at" => "14/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Magie Verte numéro 6",
      "presentation" => "Petite présentation de la magie verte numéro 6",
      "description" => "Description de la Magie Verte numéro 6",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "6",
      "lienPhoto0" => "https://cdn.radiofrance.fr/s3/cruiser-production/2019/08/881666ea-f7aa-4f70-ac8a-e7384ec88fd6/1200x680_nature_gettyimages-953168856.jpg",
      "created_at" => "24/07/2022",
      "update_at" => "",
    ],
    [
      "name" => "Magie Verte numéro 7",
      "presentation" => "Petite présentation de la magie verte numéro 7",
      "description" => "Description de la Magie Verte numéro 7",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "5",
      "lienPhoto0" => "https://img.passeportsante.net/1200x675/2020-01-30/i93408-.webp",
      "created_at" => "28/08/2022",
      "update_at" => "",
    ],
    [
      "name" => "Magie Verte numéro 8",
      "presentation" => "Petite présentation de la magie verte numéro 8",
      "description" => "Description de la Magie Verte numéro 8",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "4",
      "lienPhoto0" => "https://www.widoobiz.com/wp-content/uploads/2019/05/rsz-simon-migaj-421505-unsplash-1072x568.jpg",
      "created_at" => "03/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Magie Verte numéro 9",
      "presentation" => "Petite présentation de la magie verte numéro 9",
      "description" => "Description de la Magie Verte numéro 9",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "3",
      "elementPhyto" => "2",
      "elementSabbat" => "3",
      "lienPhoto0" => "https://static.vecteezy.com/ti/photos-gratuite/p3/1226152-moraine-lac-au-coucher-du-soleil-gratuit-photo.jpeg",
      "created_at" => "04/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Magie Verte numéro 10",
      "presentation" => "Petite présentation de la magie verte numéro 10",
      "description" => "Description de la Magie Verte numéro 10",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "2",
      "lienPhoto0" => "https://media.istockphoto.com/photos/landscape-sunset-view-of-morain-lake-and-mountain-range-picture-id514773355?k=20&m=514773355&s=170667a&w=0&h=78p_CQzBOD9gBKoOUBp7x9Cv2yttfKzSRrHWowkvaNs=",
      "created_at" => "05/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Magie Verte numéro 11",
      "presentation" => "Petite présentation de la magie verte numéro 11",
      "description" => "Description de la Magie Verte numéro 11",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "1",
      "lienPhoto0" => "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/24701-nature-natural-beauty.jpg/1280px-24701-nature-natural-beauty.jpg",
      "created_at" => "06/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Magie Verte numéro 12",
      "presentation" => "Petite présentation de la magie verte numéro 12",
      "description" => "Description de la Magie Verte numéro 12",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "8",
      "lienPhoto0" => "https://www.holland.com/upload_mm/9/8/d/68961_fullimage_de-natuurgebieden-van-nederland.jpg",
      "created_at" => "07/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Magie Verte numéro 13",
      "presentation" => "Petite présentation de la magie verte numéro 13",
      "description" => "Description de la Magie Verte numéro 13",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "7",
      "lienPhoto0" => "https://www.lepointdufle.net/ia/nature2.jpg",
      "created_at" => "08/06/2022",
      "update_at" => "",
    ],
    [
      "name" => "Magie Verte numéro 14",
      "presentation" => "Petite présentation de la magie verte numéro 14",
      "description" => "Description de la Magie Verte numéro 14",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "6",
      "lienPhoto0" => "https://img.freepik.com/photos-gratuite/femme-priant-oiseau-libre-profitant-nature-fond-coucher-soleil-notion-espoir_34200-256.jpg?w=2000",
      "created_at" => "09/06/2022",
      "update_at" => "",
    ]
  ];

  public function load(ObjectManager $manager)
  {
    $faker = Faker\Factory::create('fr_FR');
    $faker->addProvider(new \App\Faker\Provider\PicsumImage($faker));

    foreach (self::MAGIEVERTES as $key => $magieVerte) {
      $nom = $magieVerte['name'];
      $presentation = $magieVerte['presentation'];
      $description = $magieVerte['description'];
      $lienVideo = $magieVerte['lienVideo'];
      $elementBase = $magieVerte['elementBase'];
      $elementPhyto = $magieVerte['elementPhyto'];
      $elementSabbat = $magieVerte['elementSabbat'];
      $lienPhoto0 = $magieVerte['lienPhoto0'];
      $day = substr($magieVerte['created_at'], 0, 2);
      $month = substr($magieVerte['created_at'], 3, 2);
      $year = substr($magieVerte['created_at'], 6, 4);
      $dateCreation = new DateTimeImmutable();
      $dateCreation->setDate($year, $month, $day);
      $update_at = $magieVerte['update_at'];
      $newMagieVerte = new MagieVerte();
      $newMagieVerte->setName($nom);
      $newMagieVerte->setPresentation($presentation);
      $newMagieVerte->setDescription($description);
      $newMagieVerte->addElementBase($this->getReference('elementBase_' . $elementBase));
      $newMagieVerte->addElementPhyto($this->getReference('elementPhyto_' . $elementPhyto));
      $newMagieVerte->addElementSabbat($this->getReference('elementSabbat_' . $elementSabbat));

      for($image = 1; $image <6; $image++){
        $img = $faker->image('public/images/magievertes');
        $nomImg = basename($img);
        $imageMagieVerte = new MagieVerteImage();
        $imageMagieVerte->setName($nomImg);
        $newMagieVerte->addImage($imageMagieVerte);
      }
      for($option = 1; $option <3; $option++){
        $newOption = new MagieVerteOption();
        $newOption->setType($this->getReference('typeoptions_' . $faker->numberBetween(4,8)));
        $newOption->setContent($faker->realText);
        $newMagieVerte->addOption($newOption);
      }
      $newMagieVerte->setCreatedAt($dateCreation);
      $manager->persist($newMagieVerte);
      $this->addReference('magieverte_' . ($key + 1), $newMagieVerte);
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
      RecetteFixtures::class,
    ];
  }
}
