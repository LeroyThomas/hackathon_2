<?php

namespace App\Controller;

use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultController extends AbstractController
{
    /**
     * @Route("/result", name="result")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()
            ->getRepository(Question::class);

        $randQuestion = $repository->createQueryBuilder('q')
            ->orderBy('RAND()')
            ->setMaxResults(1)
            ->getQuery()
            ->execute();

        return $this->render('Result/result.html.twig', [
            'randQuestion'=>$randQuestion,
        ]);
    }
}
