<?php

namespace App\DataFixtures;

use App\Entity\ConseilDuNaturo;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ConseilsDNFixtures extends Fixture implements DependentFixtureInterface
{
  const CONSEILS = [
    [
      "conseil" => "Conseil du naturo numéro 1",
      "presentation" => "petite présentation du conseil numéro 1",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "3",
      "lienPhoto" => "https://img.freepik.com/photos-gratuite/route-etroite-dans-champ-herbeux-vert-entoure-arbres-verts-soleil-eclatant-arriere-plan_181624-9968.jpg?w=2000",
    ],
    [
      "conseil" => "Conseil du naturo numéro 2",
      "presentation" => "petite présentation du conseil numéro 2",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "2",
      "elementPhyto" => "2",
      "elementSabbat" => "2",
      "lienPhoto" => "https://cdn.artphotolimited.com/images/60df3a8fbd40b852ce5e0fff/300x300/red-tree.jpg",
    ],
    [
      "conseil" => "Conseil du naturo numéro 3",
      "presentation" => "petite présentation du conseil numéro 3",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8ucembed/lygMPwUj9yU",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "1",
      "lienPhoto" => "https://images.all-free-download.com/images/graphiclarge/background_blue_clear_265915.jpg",
    ],
    [
      "conseil" => "Conseil du naturo numéro 4",
      "presentation" => "petite présentation du conseil numéro 4",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "4",
      "elementPhyto" => "2",
      "elementSabbat" => "8",
      "lienPhoto" => "https://media.istockphoto.com/photos/nature-landscape-picture-id1162946429?k=20&m=1162946429&s=170667a&w=0&h=DUoS5ZW7OPfLJXIZtSnebqgR7IblgPDnLgG1UGHlOSk=",
    ],
    [
      "conseil" => "Conseil du naturo numéro 5",
      "presentation" => "petite présentation du conseil numéro 5",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "5",
      "elementPhyto" => "2",
      "elementSabbat" => "7",
      "lienPhoto" => "https://thumbs.dreamstime.com/b/hand-holding-glass-globe-ball-tree-growing-green-nature-blur-background-eco-concept-161081206.jpg",
    ],
    [
      "conseil" => "Conseil du naturo numéro 6",
      "presentation" => "petite présentation du conseil numéro 6",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "6",
      "lienPhoto" => "https://cdn.radiofrance.fr/s3/cruiser-production/2019/08/881666ea-f7aa-4f70-ac8a-e7384ec88fd6/1200x680_nature_gettyimages-953168856.jpg",
    ],
    [
      "conseil" => "Conseil du naturo numéro 7",
      "presentation" => "petite présentation du conseil numéro 7",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "5",
      "lienPhoto" => "https://img.passeportsante.net/1200x675/2020-01-30/i93408-.webp",
    ],
    [
      "conseil" => "Conseil du naturo numéro 8",
      "presentation" => "petite présentation du conseil numéro 8",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "4",
      "lienPhoto" => "https://www.widoobiz.com/wp-content/uploads/2019/05/rsz-simon-migaj-421505-unsplash-1072x568.jpg",
    ],
    [
      "conseil" => "Conseil du naturo numéro 9",
      "presentation" => "petite présentation du conseil numéro 9",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "3",
      "elementPhyto" => "2",
      "elementSabbat" => "3",
      "lienPhoto" => "https://static.vecteezy.com/ti/photos-gratuite/p3/1226152-moraine-lac-au-coucher-du-soleil-gratuit-photo.jpeg",
    ],
    [
      "conseil" => "Conseil du naturo numéro 10",
      "presentation" => "petite présentation du conseil numéro 10",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "2",
      "lienPhoto" => "https://media.istockphoto.com/photos/landscape-sunset-view-of-morain-lake-and-mountain-range-picture-id514773355?k=20&m=514773355&s=170667a&w=0&h=78p_CQzBOD9gBKoOUBp7x9Cv2yttfKzSRrHWowkvaNs=",
    ],
    [
      "conseil" => "Conseil du naturo numéro 11",
      "presentation" => "petite présentation du conseil numéro 11",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "1",
      "lienPhoto" => "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/24701-nature-natural-beauty.jpg/1280px-24701-nature-natural-beauty.jpg",
    ],
    [
      "conseil" => "Conseil du naturo numéro 12",
      "presentation" => "petite présentation du conseil numéro 12",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "8",
      "lienPhoto" => "https://www.holland.com/upload_mm/9/8/d/68961_fullimage_de-natuurgebieden-van-nederland.jpg",
    ],
    [
      "conseil" => "Conseil du naturo numéro 13",
      "presentation" => "petite présentation du conseil numéro 13",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "7",
      "lienPhoto" => "https://www.lepointdufle.net/ia/nature2.jpg",
    ],
    [
      "conseil" => "Conseil du naturo numéro 14",
      "presentation" => "petite présentation du conseil numéro 14",
      "lienVideo" => "https://www.youtube.com/embed/BdpLm-EO8uc",
      "elementBase" => "1",
      "elementPhyto" => "2",
      "elementSabbat" => "6",
      "lienPhoto" => "https://img.freepik.com/photos-gratuite/femme-priant-oiseau-libre-profitant-nature-fond-coucher-soleil-notion-espoir_34200-256.jpg?w=2000",
    ],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::CONSEILS as $key => $conseil) {
      $nom = $conseil['conseil'];
      $presentation = $conseil['presentation'];
      $lienVideo = $conseil['lienVideo'];
      $elementBase = $conseil['elementBase'];
      $elementPhyto = $conseil['elementPhyto'];
      $elementSabbat = $conseil['elementSabbat'];
      $lienPhoto = $conseil['lienPhoto'];
      $newConseil = new ConseilDuNaturo();
      $newConseil->setConseil($nom);
      $newConseil->setPresentation($presentation);
      $newConseil->setLienVideo($lienVideo);
      $newConseil->addElementBase($this->getReference('elementBase_' . $elementBase));
      $newConseil->addElementPhyto($this->getReference('elementPhyto_' . $elementPhyto));
      $newConseil->addElementSabbat($this->getReference('elementSabbat_' . $elementSabbat));
      $newConseil->setLienPhoto($lienPhoto);
      $manager->persist($newConseil);
      $this->addReference('consielDN_' . ($key + 1), $newConseil);
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
    ];
  }
}
