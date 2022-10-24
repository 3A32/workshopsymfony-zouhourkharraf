<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/liststudents', name: 'app_list_students')]
    public function listofstudents(StudentRepository $repository)
    {
        $List = $repository->findAll();
        return $this->render('student/list.html.twig', array("liste_etudiants" => $List));
    }

    #[Route('/addstudent', name: 'app_add_student')]
    public function AddStudent(ManagerRegistry $doctrine, Request $request)
    {
        $student = new Student();
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $doctrine->getManager();
            $em->persist($student);
            $em->flush();
            return $this->redirectToRoute('app_list_students');
        }

        return $this->renderForm('student/add.html.twig', array("form" => $form));
    }
}
