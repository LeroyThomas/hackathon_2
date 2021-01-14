<?php

namespace App\Controller;

use App\Entity\ResultsGame;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Pusher\Pusher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Answer;
use App\Entity\Question;
use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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

    /**
     * @Route("/playerresult/{userId}/{questionId}/{answerId}", name="player_result", methods={"GET"})
     * @paramConverter("user", options={"mapping": {"userId": "id"}})
     * @paramConverter("question", options={"mapping": {"questionId": "id"}})
     * @paramConverter("answer", options={"mapping": {"answerId": "id"}})
     * @param User $user
     * @param Question $question
     * @param Answer $answer
     * @param EntityManagerInterface $em
     * @return string
     */
    public function resultGame(User $user, Question $question, Answer $answer, EntityManagerInterface $em): Response
    {
        $resultGame = new ResultsGame();
        $resultGame->setUser($user);
        $resultGame->setQuestion($question);
        $resultGame->setAnswer($answer);
        $em->persist($resultGame);
        $em->flush();
        return $this->redirectToRoute('result');
    }
}
