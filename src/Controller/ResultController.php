<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Question;
use App\Entity\ResultsGame;
use App\Repository\AnswerRepository;
use App\Repository\ResultsGameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use App\Entity\User;

class ResultController extends AbstractController
{
    /**
     * @Route("/result", name="result", methods={"GET"})
     * @param ResultsGameRepository $resultsGameRepository
     * @return Response
     */
    public function index(ResultsGameRepository $resultsGameRepository): Response
    {
        $results = $resultsGameRepository->findAll();
        return $this->render('Result/result.html.twig', [
            'results' => $results
        ]);
    }

    /**
     * @Route("/winner/{id}", name="winner", methods={"GET"})
     * @param User $winner
     * @return Response
     */
    public function winner(User $winner): Response
    {
        return $this->render('Result/winner.html.twig', [
            'winner' => $winner
        ]);
    }
}
