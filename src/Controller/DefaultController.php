<?php

// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController  extends AbstractController
{
    #[Route('/prime/{number}', methods: ["GET"])]
    public function checkPrimeNumber($number): JsonResponse
    {
        $isPrime = $this->isPrime($number);

        return new JsonResponse([
            'number' => $number,
            'is_prime' => $isPrime,
            'message' => $isPrime ? 'Это простое число' : 'Это составное число'
        ]);
    }
    private function isPrime(int $number): bool
    {
        if ($number <= 1) {
            return false;
        }
        if ($number == 2) {
            return true;
        }
        if ($number % 2 == 0) {
            return false;
        }
        for ($i = 3; $i <= sqrt($number); $i += 2) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
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
}
