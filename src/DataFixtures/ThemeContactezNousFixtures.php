<?php

namespace App\DataFixtures;

use App\DataFixtures\UserFixtures as DataFixturesUserFixtures;
use App\Entity\ThemeContactezNous;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ThemeContactezNousFixtures extends Fixture implements DependentFixtureInterface
{
  const THEMES = [
    ["name" => "question relatif livraison", "email" => "magalilivraison@terredavalonne.com"],
    ["name" => "question relatif hypnose", "email" => "magalihypnose@terredavalonne.com"],
    ["name" => "question relatif plante", "email" => "magaliplante@terredavalonne.com"],
    ["name" => "question relatif coaching", "email" => "erikcoaching@terredavalonne.com"],
    ["name" => "question relatif programme QG", "email" => "erikqg@terredavalonne.com"]
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::THEMES as $key => $theme) {
      $name = $theme['name'];
      $email = $theme['email'];
      $newTheme = new ThemeContactezNous();
      $newTheme->setName($name);
      $newTheme->setEmail($email);
      $manager->persist($newTheme);
      $this->addReference('theme_' . ($key + 1), $newTheme);
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
      BlocContentFixtures::class,
      BlocContentAttachementFixtures::class,
      DataFixturesUserFixtures::class
    ];
  }
}
