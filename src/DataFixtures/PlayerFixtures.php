<?php


namespace App\DataFixtures;

use App\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class PlayerFixtures extends Fixture
{
    const PLAYERS = [
        "Titi",
        "Tata",
        "Toto",
        "Fraise",
        "Pomme",
        "Azerty"
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PLAYERS as $key => $playerName) {
        $player = new Player();
        $player->setName($playerName);
        $player->setRoles(['ROLE_USER']);

        $manager->persist($player);

    }

        $manager->flush();
    }

}
