<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    //Atelier2.2 III- Génération automatique d’un contrôleur

    #[Route('/teacher', name: 'app_teacher')]
    public function index(): Response
    {
        return $this->render('teacher/index.html.twig', [
            'controller_name' => 'TeacherController',
        ]);
    }
    //Question1+2+3:
    #[Route('/teacher{name}', name: 'app_showteacher')]
    public function showTeacher($name)
    {
        return new Response("Bonjour " . $name . " !");
    }

    //Question4:
    #[Route('/showteacher', name: 'app_showteacher_2')]
    public function showTeacher_2()
    {
        $nom = "maram";
        return $this->render('teacher/showTeacher.html.twig', ['nom_1' => $nom]);
    }

    #[Route('/redirigerStudent', name: 'app_teacher_vers_student')]
    public function serediriger_vers_student()
    {
        return $this->redirectToRoute('app_student'); //permet de se rediriger vers une route
    }

    // fin Atelier2.2 III- Génération automatique d’un contrôleur



}
