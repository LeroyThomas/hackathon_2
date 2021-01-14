<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Answer;

class PlayerController extends AbstractController
{
    /**
     * @Route("/player", name="player")
     */
    public function showAnswersChoice(): Response
    {
        $repository = $this->getDoctrine()
            ->getRepository(Answer::class);

        $randAnswers = $repository->createQueryBuilder('q')
            ->orderBy('RAND()')
            ->setMaxResults(5)
            ->getQuery()
            ->execute();

        return $this->render('Player/player.html.twig', [
            'controller_name' => 'PlayerController',
            'randAnswers' => $randAnswers
        ]);
    }
}
