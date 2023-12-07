<?php

namespace App\Controller;

use App\Repository\PossessionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Context\Normalizer\ObjectNormalizerContextBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class PossessionController extends AbstractController
{
    #[Route('/possession', name: 'app_possession', methods: ['GET'])]
    public function index(PossessionRepository $possessionRepository, SerializerInterface $serializer): Response
    {
        $object = $possessionRepository->findAll();

        $context = (new ObjectNormalizerContextBuilder())
            ->withGroups('possession')
            ->withCircularReferenceLimit(2)
            ->toArray();
   
        $possessions_json = $serializer->serialize($object, 'json', $context);

        print_r($possessions_json);

        return $this->render('possession/index.html.twig', [
            'possessions_json' => $possessions_json,
        ]);
    }
}
