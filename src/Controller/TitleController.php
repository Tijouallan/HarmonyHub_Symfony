<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TitleRepository;

$titles = [
    [
        'title' => 'Title 1',
        'artist' => 'Artist 1',
        'tags' => 'Tag1, Tag2',
    ],
    [
        'title' => 'Title 2',
        'artist' => 'Artist 2',
        'tags' => 'Tag3, Tag4',
    ],
    [
        'title' => 'Title 3',
        'artist' => 'Artist 3',
        'tags' => 'Tag5, Tag6',
    ],
    [
        'title' => 'Title 4',
        'artist' => 'Artist 4',
        'tags' => 'Tag7, Tag8',
    ],
];

class TitleController extends AbstractController
{


    #[Route('/liste', name: 'liste')]
    public function liste(TitleRepository $titleRepository): Response
    {

        $titles = $titleRepository->findAll();

        return $this->render('title/index.html.twig', [
            'titles'  => $titles,
        ]);
    }
}
