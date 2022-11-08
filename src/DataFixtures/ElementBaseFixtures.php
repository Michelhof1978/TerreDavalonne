<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ElementBase;

class ElementBaseFixtures extends Fixture
{
    const ELEMENTBASES = [
        ["name" => "EAU", "color" => "rgba(4, 20, 159, 0.69)"],
        ["name" => "BOIS", "color" => "rgba(119, 189, 13, 0.67)"],
        ["name" => "FEU", "color" => "rgba(222, 23, 23, 0.67)"],
        ["name" => "TERRE", "color" => "rgba(159, 116, 3, 0.67)"],
        ["name" => "METAL", "color" => "rgba(138, 138, 138, 0.67)"]
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::ELEMENTBASES as $key => $elementBase) {
            $name = $elementBase['name'];
            $color = $elementBase['color'];
            $newElementBase = new ElementBase();
            $newElementBase->setName($name);
            $newElementBase->setColor($color);
            $manager->persist($newElementBase);
            $this->addReference('elementBase_' . ($key + 1), $newElementBase);
        }

        $manager->flush();
    }
}
