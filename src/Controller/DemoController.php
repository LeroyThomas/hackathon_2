<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Pusher\Pusher;
use Pusher\PusherException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    /**
     * @Route("/demo", name="demo", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('demo/index.html.twig');
    }

    /**
     * @Route("/demo/say-hello", name="demo_say_hello", methods={"POST"})
     * @param Pusher $pusher
     * @return Response
     * @throws PusherException
     */
    public function sayHello(Pusher $pusher, QuestionRepository $questionRepository): Response
    {
        $question = $questionRepository->createQueryBuilder('q')
            ->orderBy('RAND()')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        $pusher->trigger('greetings', 'new-greeting', $question->getId());

        return new Response();
    }
}
