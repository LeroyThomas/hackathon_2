<?php

namespace App\Controller;

use Pusher\Pusher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Answer;
use App\Entity\Question;

class PlayerController extends AbstractController
{
    /**
     * @Route("/player/{id}", name="player", methods={"GET"})
     */
    public function showAnswersChoice(Question $question): Response
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
            'randAnswers' => $randAnswers,
            'question' => $question
        ]);
    }

    /**
     * @Route("/select-answer", name="select_answer", methods={"POST"})
     * @param Pusher $pusher
     * @return Response
     * @throws \Pusher\PusherException
     */
    public function selectAnswer(Pusher $pusher): Response
    {
        $pusher->trigger('general','selectAnswer', []);

        return new Response();
    }
}
