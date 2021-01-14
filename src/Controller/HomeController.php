<?php

namespace App\Controller;

use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function showQuestion(): Response
    {
        $repository = $this->getDoctrine()
            ->getRepository(Question::class);

        $randQuestion = $repository->createQueryBuilder('q')
                        ->orderBy('RAND()')
                        ->setMaxResults(1)
                        ->getQuery()
                        ->execute();

        return $this->render('home/index.html.twig', [
            'randQuestion'=>$randQuestion,
        ]);
    }
}
