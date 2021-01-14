<?php


namespace App\DataFixtures;

use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuestionFixtures extends Fixture
{
    const QUESTIONS = [
        "C'est quoi ton mot de passe ____ tout attaché?",
        "C'est quoi ton parfum?",
        "Mon pc, je l'appelle____",
        "Le gouvernement ouvre un débat sur ___",
        "Aujourd'hui, ____ #VDM",
        "Un truc sympa à faire après le boulot, c'est ___",
        "Ce matin, une petite voix m'a réveillé en me disant ____",
        "Oui mon enfant, le prof pardonne tout, sauf ____",
        "Vous allez me traiter de petite nature, mais à midi ___ m'a coupé l'appétit",
        "Un truc à faire dans sa vie, c'est ___. Mais seulement une fois",
        "Pour grand maitre jedi devenir___tu feras",
        "Il court il court, le ___",
        "Baggy, bandana et ___",
        "Les livraisons à domicile c'est bien, sauf quand y'a ___",
        "J'peux pas, j'ai ___",
        "A 75 ans, ___, c'est un peu tard",
        "___ ok, mais avec classe et dignité",
        "___ ok, mais avec classe et dignité",
        "Faire ___, c'est comme pour tout, il y a la théorie et la pratique",
        "___ ok, mais avec classe et dignité",
        "Un truc à faire une fois dans sa vie, c'est ___ mais seulement une fois",
        "___, trankilou bilou",
        "Ton plus beau souvenir c'est ___",
        "Hier soir, belle maman m'a parlé de ___",
        "Papa, c'est quoi ____ ?"
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::QUESTIONS as $key => $questionTitle) {
            $question = new Question();
            $question->setTitle($questionTitle);

            $manager->persist($question);

        }

        $manager->flush();
    }

}