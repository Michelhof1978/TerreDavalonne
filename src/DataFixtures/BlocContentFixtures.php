<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\BlocContent;

class BlocContentFixtures extends Fixture implements DependentFixtureInterface
{
  const BLOCCONTENTS = [
    ["title" => "Plantes, Qi Gong, hypnose des mouvements pour la vie",
     "lienImage" => "https://cdn.create.vista.com/api/media/medium/421365420/stock-photo-young-tree-green-leaves-growing?token=",
     "lienVideo" => null,
     "text" => null,
     "section" => 1,
     "typeBloc" => 1],
    ["title" => "Présentation de Terre D'Avalonne par Magalie",
     "lienImage" => null,
     "lienVideo" => "https://www.youtube.com/watch?v=6CUMOgIR2iM",
     "text" => null,
     "section" => 2,
     "typeBloc" => 2],
    ["title" => "lkjfqs kljh fsdq",
     "lienImage" => "https://stickeramoi.com/15142-large_default/sticker-plantes-verte-en-pot.jpg",
     "lienVideo" => null,
     "text" => "lkjmqsfml qmf jlqhd fkqjh fqkjh flkqjhiu uyg ;j fdqg lkj dfqlkh qldf ",
     "section" => 3,
     "typeBloc" => 9],
    ["title" => "lkjbl qsdfjh ljkhqsf",
     "lienImage" => "https://i0.wp.com/jardinierparesseux.com/wp-content/uploads/2018/01/20180126c-aspidistra-www-palmaverde-nl.jpg?resize=699%2C692&ssl=1",
     "lienVideo" => null,
     "text" => "lkqjhf lkhsdfqi onhakjh kjhkqflo",
     "section" => 4,
     "typeBloc" => 9],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::BLOCCONTENTS as $key => $blocContent) {
      $title = $blocContent['title'];
      $lienImage = $blocContent['lienImage'];
      $lienVideo = $blocContent['lienVideo'];
      $text = $blocContent['text'];
      $section = $blocContent['section'];
      $typeBloc = $blocContent['typeBloc'];
      $newBlocContent = new BlocContent();
      $newBlocContent->setTitle($title);
      $newBlocContent->setLienImage($lienImage);
      $newBlocContent->setLienVideo($lienVideo);
      $newBlocContent->setText($text);
      $newBlocContent->setSectionId($this->getReference('section_' . $section));
      $newBlocContent->setTypeBloc($this->getReference('typeBloc_' . $typeBloc));
      $manager->persist($newBlocContent);
      $this->addReference('blocContent_' . ($key + 1), $newBlocContent);
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
      SectionFixtures::class
    ];
  }
}
