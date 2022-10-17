<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class StudentController extends AbstractController
{
    //Atelier2.2  Manipulation du Contrôleur et Routing :

    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        //méthode1:
        /*  $message="Bonjour mes étudiants";
        //return $this->render('student/student.html.twig',['message1' =>$message ]);
        */
        //ou méthode 2:
        return new Response("Bonjour mes étudiants ");
    }

    // fin : Atelier2.2  Manipulation du Contrôleur et Routing


}
