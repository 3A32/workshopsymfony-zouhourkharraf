<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Repository\ClassroomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassroomController extends AbstractController
{
    #[Route('/classroom', name: 'app_classroom')]
    public function index(): Response
    {
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
        ]);
    }

    #[Route('/listclassroom', name: 'app_list_classroom')]
    public function list(ClassroomRepository $repository)
    {
        $ListClassroom = $repository->findAll();
        return $this->render('classroom/list.html.twig', array("liste_des_classes" => $ListClassroom));
    }
}
