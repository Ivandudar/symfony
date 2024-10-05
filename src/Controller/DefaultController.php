<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'news_default', methods: ['GET'])]
    public function index(NewsRepository $newsRepository, UserRepository $userRepository): Response
    {
        $user = $this->getUser();
        return $this->render('index.html.twig', [
            'news' => $newsRepository->findAll(),
            'user' => $user,
        ]);
    }
}
