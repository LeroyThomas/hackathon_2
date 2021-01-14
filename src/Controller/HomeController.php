<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\QuestionRepository;
use Pusher\Pusher;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function showQuestion(Request $request): Response
    {
        $question = new Question();
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($question);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }
        $repository = $this->getDoctrine()
            ->getRepository(Question::class);

        $randQuestion = $repository->createQueryBuilder('q')
                        ->orderBy('RAND()')
                        ->setMaxResults(1)
                        ->getQuery()
                        ->execute();

        return $this->render('home/index.html.twig', [
            'randQuestion'=>$randQuestion,
            'question'=>$question,
            'form'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/start-game", name="start_game", methods={"POST"})
     * @param Pusher $pusher
     * @param QuestionRepository $questionRepository
     * @return Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Pusher\PusherException
     */
    public function startGame(Pusher $pusher, QuestionRepository $questionRepository): Response
    {
        $question = $questionRepository->createQueryBuilder('q')
            ->orderBy('RAND()')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        $pusher->trigger('general', 'start-game', $question->getId());

        return new Response();
    }
}
