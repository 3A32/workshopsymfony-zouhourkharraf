<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    #[Route('/event', name: 'app_event')]
    public function index(): Response
    {
        return $this->render('event/index.html.twig', [
            'controller_name' => 'EventController',
        ]);
    }

    #[Route('/listevent', name: 'app_list_event')]
    public function show_event(EventRepository $repository)
    {
        $listevent = $repository->findAll();
        return $this->render('event/listevent.html.twig', array('list_events' => $listevent));
    }
}
