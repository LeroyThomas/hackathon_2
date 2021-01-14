<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ResultController extends AbstractController
{
    /**
     * @Route("/result/{questionId}/{answerId}", name="result", methods={"GET"})
     * @paramConverter("question", options={"mapping": {"questionId": "id"}})
     * @paramConverter("answer", options={"mapping": {"answerId": "id"}})
     * @param Question $question
     * @param Answer $answer
     * @return Response
     */
    public function index(Question $question, Answer $answer): Response
    {
        return $this->render('Result/result.html.twig', [
            'question'=>$question,
            'answer'=>$answer,
        ]);
    }
}
