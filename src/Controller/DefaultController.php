<?php

// src/Controller/DefaultController.php
namespace App\Controller;

use App\Service\GreetingService;
use App\Service\IsPrimeService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController  extends AbstractController
{
    private GreetingService $greetingService;
    private IsPrimeService $isPrimeService;

    public function __construct(GreetingService $greetingService, IsPrimeService $isPrimeService)
    {
        $this->greetingService = $greetingService;
        $this->isPrimeService = $isPrimeService;
    }

    #[Route('/prime/{number}', methods: ["GET"])]
    public function checkPrimeNumber($number): JsonResponse
    {
        $isPrime = $this->isPrimeService->isPrime($number);


        return new JsonResponse([
            'number' => $number,
            'is_prime' => $isPrime,
            'message' => $isPrime ? 'Это простое число' : 'Это составное число'
        ]);
    }


    #[Route('/hello/{name}', methods: ['GET'])]
    public function index(string $name): Response
    {
        return $this->render('index.html.twig', [
            'name' => $name,
        ]);
    }
    #[Route('/simplicity', methods: ['GET'])]
    public function simple(): Response
    {
        return new Response('Simple! Easy! Great!');
    }
    // 
    #[Route('/greet/{name}', name: 'app_greet')]
    public function greet(string $name): Response
    {
        $message = $this->greetingService->getGreeting($name);

        return new Response($message);
    }
}
