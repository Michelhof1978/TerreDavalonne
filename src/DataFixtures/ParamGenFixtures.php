<?php

namespace App\DataFixtures;

use App\Entity\ParametersGeneraux;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ParamGenFixtures extends Fixture implements DependentFixtureInterface
{
  const PARAMS = [
    [
      "siteName" => "Terre D'avalonne",
      "logo" => "dice4.png",
      "adress" => "12 rue du Pape",
      "zip" => "69000",
      "city" => "LYON",
      "phoneNumber" => "0478788963",
      "emailContact" => "toto@gmail.com",
      "lienYoutube" => "https://www.youtube.com/watch?v=kUu5Q6z85vk",
      "lienInstagram" => "https://www.instagram.com/?hl=en",
      "lienMeta" => "https://www.facebook.com/",
      "lienTiktok" => "https://www.tiktok.com/en/",
    ],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::PARAMS as $key => $param) {
      $siteName = $param['siteName'];
      $logo = $param['logo'];
      $adress = $param['adress'];
      $zip = $param['zip'];
      $city = $param['city'];
      $phoneNumber = $param['phoneNumber'];
      $emailContact = $param['emailContact'];
      $lienYoutube = $param['lienYoutube'];
      $lienInstagram = $param['lienInstagram'];
      $lienMeta = $param['lienMeta'];
      $lienTiktok = $param['lienTiktok'];
      $newParamG = new ParametersGeneraux();
      $newParamG->setSiteName($siteName);
      $newParamG->setLogo($logo);
      $newParamG->setAdress($adress);
      $newParamG->setZip($zip);
      $newParamG->setCity($city);
      $newParamG->setPhoneNumber($phoneNumber);
      $newParamG->setEmailContact($emailContact);
      $newParamG->setLienYoutube($lienYoutube);
      $newParamG->setLienInstagram($lienInstagram);
      $newParamG->setLienMeta($lienMeta);
      $newParamG->setLienTiktok($lienTiktok);
      $manager->persist($newParamG);
      $this->addReference('paramG_' . ($key + 1), $newParamG);
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
    ];
  }
}
