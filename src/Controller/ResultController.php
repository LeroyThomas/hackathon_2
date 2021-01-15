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

class ResultController extends AbstractController
{
    /**
     * @Route("/result", name="result", methods={"GET"})
     * @param Question $question
     * @param Answer $answer
     * @return Response
     */
    public function index(ResultsGameRepository $resultsGameRepository): Response
    {
        $results = $resultsGameRepository->findAll();
        return $this->render('Result/result.html.twig', [
            'results' => $results
        ]);
    }
}
