<?php


namespace App\DataFixtures;

use App\Entity\Answer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnswerFixtures extends Fixture
{
    const ANSWERS = [
        "Christine Boutin",
        "Larguer par texto",
        "Lorem ipsum dolor sit amet",
        "L'Amicale des anciens Khmers Rouges",
        "Le gras du bide",
        "Emmanuel Macron",
        "Le dernier quinquénat de François Hollande",
        "Mettre un aileron sur une fiat punto",
        "Un parfum au caca",
        "Un marseillais en string",
        "La  danse des canards",
        "une colloscopie à cloche pied",
        "La page lingerie du catalogue la redoute",
        "Une fausse promesse au Téléthon",
        "Danser la macaréna en réu",
        "Pendant le poker planning",
        "La soupe à l'oignon",
        "Guy Georges",
        "Vomir sur le PC",
        "Vendre ses enfants sur internet",
        "Un bon cassoulet",
        "S'assoir sur un cactus",
        "Un discours philisiphique de Frank Ribery",
        "Ebola",
        "Un bisou magique pour calmer la douleur",
        "Un bisou sur le coude",
        "La moustache de mamie",
        "Mickael Jackson",
        "Aller planter des carottes",
        "faire un caprice roulé par terre",
        "avoir la gueule de bois",
        "Faire pipi debout",
        "manger à quatre pattes",
        "Kamoulox",
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::ANSWERS as $key => $answerTitle) {
            $answer = new Answer();
            $answer->setTitle($answerTitle);

            $manager->persist($answer);

        }

        $manager->flush();
    }

}