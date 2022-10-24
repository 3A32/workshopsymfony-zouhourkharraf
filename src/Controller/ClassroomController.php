<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Form\ClassroomType;
use App\Repository\ClassroomRepository;
use Doctrine\Persistence\ManagerRegistry;
use PhpParser\Builder\Class_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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


    #[Route('/addclassroom', name: 'app_add_classroom')]
    public function AddClassroom(ManagerRegistry $doctrine, Request $request)
    {
        $classroom = new Classroom();
        $form = $this->createForm(ClassroomType::class, $classroom);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $doctrine->getManager();
            $em->persist($classroom);
            $em->flush();
            return $this->redirectToRoute('app_list_classroom');
        }

        return $this->renderForm('classroom/addclass.html.twig', array("form" => $form));
    }


    #[Route('/updateclassroom{nom}', name: 'app_update_classroom')]
    public function UpdateClassroom($nom, ManagerRegistry $doctrine, Request $request, ClassroomRepository $repository)
    {
        $classroom = $repository->findOneByname($nom);
        $form = $this->createForm(ClassroomType::class, $classroom);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('app_list_classroom');
        }

        return $this->renderForm('classroom/updateclass.html.twig', array('form_update' => $form));
    }

    #[Route('/deleteclassroom{nom}', name: 'app_delete_classroom')]
    public function DeleteClassroom($nom, ManagerRegistry $doctrine, ClassroomRepository $repository)
    {
        $classroom = $repository->findOneByname($nom);

        $em = $doctrine->getManager();
        $em->remove($classroom);
        $em->flush();
        return $this->redirectToRoute('app_list_classroom');
    }
}
