<?php

namespace App\DataFixtures;

use App\Entity\ElementSabbat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Profession;

class ProfessionFixtures extends Fixture implements DependentFixtureInterface
{
  const PROFESSIONS = [
    ["name" => "Exploitants de l’agriculture, sylviculture, pêche et aquaculture"],
    ["name" => "Artisans"],
    ["name" => "Commerçants et assimilés"],
    ["name" => "Chefs d’entreprise de plus de 10 personnes"],
    ["name" => "Professions libérales"],
    ["name" => "Cadres administratifs et techniques de la fonction publique"],
    ["name" => "Professeurs et professions scientifiques supérieures"],
    ["name" => "Professions de l’information, de l’art et des spectacles"],
    ["name" => "Cadres des services administratifs et commerciaux d’entreprise"],
    ["name" => "Ingénieurs et cadres techniques d’entreprise"],
    ["name" => "Professions de l’enseignement primaire et professionnel, de la formation continue et du sport"],
    ["name" => "Professions intermédiaires de la santé et du travail social"],
    ["name" => "Ministres du culte et religieux consacrés"],
    ["name" => "Professions intermédiaires de la fonction publique (administration, sécurité)"],
    ["name" => "Professions intermédiaires administratives et commerciales des entreprises"],
    ["name" => "Techniciens"],
    ["name" => "Agents de maîtrise (hors maîtrise administrative)"],
    ["name" => "Employés administratifs de la fonction publique, agents de service et auxiliaires de santé"],
    ["name" => "Policiers, militaires, pompiers, agents de sécurité privée"],
    ["name" => "Employés administratifs d'entreprise"],
    ["name" => "Employés de commerce"],
    ["name" => "Personnels des services directs aux particuliers"],
    ["name" => "Ouvriers qualifiés de type industriel"],
    ["name" => "Ouvriers qualifiés de type artisanal"],
    ["name" => "Conducteurs de véhicules de transport, chauffeurs-livreurs, coursiers"],
    ["name" => "Conducteurs d’engins, caristes, magasiniers et ouvriers du transport (non routier)"],
    ["name" => "Ouvriers peu qualifiés de type industriel"],
    ["name" => "Ouvriers peu qualifiés de type artisanal"],
    ["name" => "Etudiant, alternant"],
    ["name" => "sans emploi"],
    ["name" => "Ouvriers agricoles, des travaux forestiers, de la pêche et de l’aquaculture"]
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::PROFESSIONS as $key => $profession) {
      $name = $profession['name'];
      $newProfession = new Profession();
      $newProfession->setName($name);
      $manager->persist($newProfession);
      $this->addReference('profession_' . ($key + 1), $newProfession);
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
    ];
  }
}
