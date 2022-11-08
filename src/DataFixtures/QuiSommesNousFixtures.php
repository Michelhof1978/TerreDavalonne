<?php

namespace App\DataFixtures;

use App\Entity\QuiSommesNous;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuiSommesNousFixtures extends Fixture implements DependentFixtureInterface
{
  const PRESENTATIONS = [
    [
      "description" => '<h1>Qui sommes nous ?</h1>

      <p>&nbsp;</p>
      
      <h2>Maglie</h2>
      
      <p><img alt="Céline Pivoine Eyes (@CelineEyes) / Twitter" class="Q4LuWd rg_i" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdeaXW252frQ8P6aC_ahuNRGXgCIpY1Uoj2w&amp;usqp=CAU" style="height:180px; width:253px" /> Sp&eacute;cialiste en botanique, je fais depuis des ann&eacute;es, d&eacute;couvrir le vaste monde des plantes lors de balades botaniques et de sc&eacute;ance de coaching. La connaissance des plantes est sources de nombreuses solutions pour se sentir mieux &agrave; tout moment de la vie.</p>
      
      <p>&nbsp;</p>
      
      <p>Diplom&eacute; de l&#39;&eacute;cole Lyon botaniste, j&#39;ai fait de nombreuses recherches dans les alpes et plus particuli&egrave;rement dans le massif de beldonnes o&ugrave; de nombreuses plantes end&eacute;miques sont particuli&egrave;rement interessantes pour le domaine m&eacute;dicale.</p>
      
      <p>&nbsp;</p>
      
      <p>Erik</p>
      
      <p>&nbsp;</p>
      
      <p>Apr&egrave;s tout une vie bien remplie, je me suis orient&eacute; vers le bien &ecirc;tre dans la pratique du Qi Gong. Aujourd&#39;hui, j&#39;ai plaisir &agrave; organiser des stages d&#39;apprentissage du Qi Gong mais aussi d&#39;accompagner les pratiquants au travers de coaching individuel. <img alt="Qigong : images, photos et images vectorielles de stock | Shutterstock" class="Q4LuWd rg_i" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSH44xIeFAtIZ3KzpmeNvuzk_u14mLFPalnQQ&amp;usqp=CAU" style="height:178px; width:285px" /></p>',
    ],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::PRESENTATIONS as $key => $presentation) {
      $description = $presentation['description'];
      $newQui = new QuiSommesNous();
      $newQui->setDescription($description);
      $manager->persist($newQui);
      $this->addReference('quisommesnous_' . ($key + 1), $newQui);
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
    ];
  }
}
