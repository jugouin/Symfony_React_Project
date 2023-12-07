<?php

namespace App\Controller;

use App\Entity\Possession;
use App\Entity\Users;
use App\Form\UsersType;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Context\Normalizer\ObjectNormalizerContextBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/users')]
class UsersController extends AbstractController
{
    #[Route('/', name: 'app_users_index', methods: ['GET'])]
    public function index(UsersRepository $usersRepository, SerializerInterface $serializer): Response
    {
        $users_data = $usersRepository->findAll();

        $context = (new ObjectNormalizerContextBuilder())
            ->withGroups('user')
            ->toArray();

        $users_json = $serializer->serialize($users_data, 'json', $context);

        return $this->render('users/index.html.twig', [
            'users_json' => $users_json,
        ]);
    }


    #[Route('/new', name: 'app_users_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new Users();
        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_users_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('users/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_users_show', methods: ['GET'])]
    public function show(Users $user, Possession $possessions, SerializerInterface $serializer): Response
    {
        $context = (new ObjectNormalizerContextBuilder())
            ->withGroups('user')
            ->toArray();
        $user_json = $serializer->serialize($user, 'json', $context);

        $possessions = $user->getUserPossessions();
        $new_context = (new ObjectNormalizerContextBuilder())
        ->withGroups('possession')
        ->toArray();
        $possessions_json = $serializer->serialize($possessions, 'json',  $new_context);

        return $this->render('users/show.html.twig', [
            'user_json' => $user_json,
            'possessions_json' => $possessions_json
        ]);
    }

    #[Route('/{id}', name: 'app_users_delete', methods: ["POST"])]
    public function delete(Users $user, EntityManagerInterface $entityManager, SerializerInterface $serializer )
    {
        if ($user) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        $context = (new ObjectNormalizerContextBuilder())
            ->withGroups('user')
            ->toArray();

        $user_json = $serializer->serialize($user, 'json', $context);

        return new Response($user_json);
    }
}
