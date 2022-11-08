<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Page;

class PageFixtures extends Fixture implements DependentFixtureInterface
{
  const PAGES = [
    ["titre" => "Home"],
    ["titre" => "Livre d'or"],
    ["titre" => "Promo"],
    ["titre" => "Accueil Plantes Médicinales"],
    ["titre" => "Détail Plante"],
    ["titre" => "Qui sommes-nous ?"],
    ["titre" => "Politique de confidencialité"],
    ["titre" => "FAQS"],
    ["titre" => "Mentions Legales"],
    ["titre" => "Condition générale de vente"],
    ["titre" => "Nous contacter"],
    ["titre" => "Accueil boutique formation numérisée"],
    ["titre" => "Accueil boutique formation plantes"],
    ["titre" => "méditation"],
    ["titre" => "accueil Stage Atelier Balade"],
    ["titre" => "détail Stage Balade Botanique"],
    ["titre" => "conseil naturo"],
    ["titre" => "hypnose"],
    ["titre" => "accueil Dico/histoire"],
    ["titre" => "agenda"],
    ["titre" => "accueil magie verte"],
    ["titre" => "détail Sabbat"],
    ["titre" => "détail magie verte tradition"],
    ["titre" => "détail magie verte recette"],
    ["titre" => "détail magie verte bricolage"],
    ["titre" => "accueil recherche recette"],
    ["titre" => "détail recette"],
    ["titre" => "accueil coaching Vidéo"],
    ["titre" => "tableau bord utilisateur"],
    ["titre" => "Panier"],
    ["titre" => "Partenaire"],
    ["titre" => "accueil boutique"],
    ["titre" => "détail produit objet"],
    ["titre" => "Fiche stage avec système de réservation"],
    ["titre" => "tableau de bord - mes commandes"],
    ["titre" => "tableau de bord - vos cours"],
    ["titre" => "Boutique - formation gi-gong"],
    ["titre" => "Stage Atelier/gi qong/plantes identiques"],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::PAGES as $key => $page) {
      $titre = $page['titre'];
      $newPage = new Page();
      $newPage->setTitle($titre);
      $manager->persist($newPage);
      $this->addReference('page_' . ($key + 1), $newPage);
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
    ];
  }
}
