<?php

namespace App\DataFixtures;

use App\Entity\Recueil;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecueilFixtures extends Fixture implements DependentFixtureInterface
{
  const RECUEILS = [
    [
      "word" => "mot numéro 1",
      "presentation" => "mot de présentation du mot numéro 1",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8ucembed/BdpLm-EO8uc",
      "lienPhoto" => "https://img.freepik.com/photos-gratuite/route-etroite-dans-champ-herbeux-vert-entoure-arbres-verts-soleil-eclatant-arriere-plan_181624-9968.jpg?w=2000",
      "created_at" => "02/06/2022",
      "update_at" => "",
      "type" => "1",
    ],
    [
      "word" => "mot numéro 2",
      "presentation" => "mot de présentation du mot numéro 2",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8ucembed/BXbmBCt0I",
      "lienPhoto" => "https://cdn.artphotolimited.com/images/60df3a8fbd40b852ce5e0fff/300x300/red-tree.jpg",
      "created_at" => "10/06/2022",
      "update_at" => "",
      "type" => "1",
    ],
    [
      "word" => "mot numéro 3",
      "presentation" => "mot de présentation du mot numéro 3",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8ucembed/lygMPwUj9yU",
      "lienPhoto" => "https://images.all-free-download.com/images/graphiclarge/background_blue_clear_265915.jpg",
      "created_at" => "21/06/2022",
      "update_at" => "",
      "type" => "1",
    ],
    [
      "word" => "mot numéro 4",
      "presentation" => "mot de présentation du mot numéro 4",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "lienPhoto" => "https://media.istockphoto.com/photos/nature-landscape-picture-id1162946429?k=20&m=1162946429&s=170667a&w=0&h=DUoS5ZW7OPfLJXIZtSnebqgR7IblgPDnLgG1UGHlOSk=",
      "created_at" => "04/07/2022",
      "update_at" => "",
      "type" => "1",
    ],
    [
      "word" => "mot numéro 5",
      "presentation" => "mot de présentation du mot numéro 5",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "lienPhoto" => "https://thumbs.dreamstime.com/b/hand-holding-glass-globe-ball-tree-growing-green-nature-blur-background-eco-concept-161081206.jpg",
      "created_at" => "14/06/2022",
      "update_at" => "",
      "type" => "1",
    ],
    [
      "word" => "histoire numéro 1",
      "presentation" => "mot de présentation du l'histoire numéro 1",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "lienPhoto" => "https://cdn.radiofrance.fr/s3/cruiser-production/2019/08/881666ea-f7aa-4f70-ac8a-e7384ec88fd6/1200x680_nature_gettyimages-953168856.jpg",
      "created_at" => "24/07/2022",
      "update_at" => "",
      "type" => "2",
    ],
    [
      "word" => "histoire numéro 2",
      "presentation" => "mot de présentation du l'histoire numéro 2",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "lienPhoto" => "https://img.passeportsante.net/1200x675/2020-01-30/i93408-.webp",
      "created_at" => "28/08/2022",
      "update_at" => "",
      "type" => "2",
    ],
    [
      "word" => "histoire numéro 3",
      "presentation" => "mot de présentation du l'histoire numéro 3",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "lienPhoto" => "https://www.widoobiz.com/wp-content/uploads/2019/05/rsz-simon-migaj-421505-unsplash-1072x568.jpg",
      "created_at" => "03/06/2022",
      "update_at" => "",
      "type" => "2",
    ],
    [
      "word" => "histoire numéro 4",
      "presentation" => "mot de présentation du l'histoire numéro 4",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "lienPhoto" => "https://static.vecteezy.com/ti/photos-gratuite/p3/1226152-moraine-lac-au-coucher-du-soleil-gratuit-photo.jpeg",
      "created_at" => "04/06/2022",
      "update_at" => "",
      "type" => "2",
    ],
    [
      "word" => "histoire numéro 5",
      "presentation" => "mot de présentation du l'histoire numéro 5",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "lienPhoto" => "https://media.istockphoto.com/photos/landscape-sunset-view-of-morain-lake-and-mountain-range-picture-id514773355?k=20&m=514773355&s=170667a&w=0&h=78p_CQzBOD9gBKoOUBp7x9Cv2yttfKzSRrHWowkvaNs=",
      "created_at" => "05/06/2022",
      "update_at" => "",
      "type" => "2",
    ],
    [
      "word" => "histoire numéro 6",
      "presentation" => "mot de présentation du l'histoire numéro 6",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "lienPhoto" => "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/24701-nature-natural-beauty.jpg/1280px-24701-nature-natural-beauty.jpg",
      "created_at" => "06/06/2022",
      "update_at" => "",
      "type" => "2",
    ],
    [
      "word" => "histoire numéro 7",
      "presentation" => "mot de présentation du l'histoire numéro 7",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "lienPhoto" => "https://www.holland.com/upload_mm/9/8/d/68961_fullimage_de-natuurgebieden-van-nederland.jpg",
      "created_at" => "07/06/2022",
      "update_at" => "",
      "type" => "2",
    ],
    [
      "word" => "histoire numéro 8",
      "presentation" => "mot de présentation du l'histoire numéro 8",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "lienPhoto" => "https://www.lepointdufle.net/ia/nature2.jpg",
      "created_at" => "08/06/2022",
      "update_at" => "",
      "type" => "2",
    ],
    [
      "word" => "histoire numéro 9",
      "presentation" => "mot de présentation du l'histoire numéro 9",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "lienPhoto" => "https://img.freepik.com/photos-gratuite/femme-priant-oiseau-libre-profitant-nature-fond-coucher-soleil-notion-espoir_34200-256.jpg?w=2000",
      "created_at" => "09/06/2022",
      "update_at" => "",
      "type" => "2",
    ],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::RECUEILS as $key => $recueil) {
      $nom = $recueil['word'];
      $presentation = $recueil['presentation'];
      $lienVideo = $recueil['lienVideo'];
      $lienPhoto = $recueil['lienPhoto'];
      $type = $recueil['type'];
      $day = substr($recueil['created_at'], 0, 2);
      $month = substr($recueil['created_at'], 3, 2);
      $year = substr($recueil['created_at'], 6, 4);
      $dateCreation = new DateTimeImmutable();
      $dateCreation->setDate($year, $month, $day);
      $update_at = $recueil['update_at'];
      $newRecueil = new Recueil();
      $newRecueil->setWord($nom);
      $newRecueil->setPresentation($presentation);
      $newRecueil->setLienVideo($lienVideo);
      $newRecueil->setLienPhoto($lienPhoto);
      $newRecueil->setCreatedAt($dateCreation);
      $newRecueil->setTypeRecueil($this->getReference('typeRecueil_' . $type));
      $manager->persist($newRecueil);
      $this->addReference('recueil_' . ($key + 1), $newRecueil);
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
    ];
  }
}
