<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\RecetteType;

class RecetteTypeFixtures extends Fixture implements DependentFixtureInterface
{
    const RECETTETYPES = [
        ["name" => "Sirop"],
        ["name" => "Macérat"],
        ["name" => "Alcoolature"],
        ["name" => "Baume"],
        ["name" => "Infusion"],
        ["name" => "En cuisine"],
        ["name" => "Cosmétique"],
        ["name" => "Produits d'entretien"]
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::RECETTETYPES as $key => $recetteType) {
            $name = $recetteType['name'];
            $newRecetteType = new RecetteType();
            $newRecetteType->setTypeName($name);
            $manager->persist($newRecetteType);
            $this->addReference('recetteType_' . ($key + 1), $newRecetteType);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ElementBaseFixtures::class,
            ElementPhytoFixtures::class,
            ElementSabbatFixtures::class,
        ];
    }
}
