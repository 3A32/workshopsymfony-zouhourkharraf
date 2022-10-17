<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    // Atelier 3.0 

    // Exercice 1 : Twig et Affichage d’une variable
    //Question 1+2
    #[Route('/club', name: 'app_club')]
    public function index(): Response
    {
        return $this->render('club/index.html.twig', ['controller_name' => 'ClubController',]);
    }
    //fin Question 1+2

    #[Route('/listFormation', name: 'list_formation')]
    public function listFormation()
    {

        $var1 = "3A32";
        $var2 = "J12";
        $tab_formations = array(
            array('ref' => 'form147', 'Titre' => 'Formation Symfony4', 'Description' => 'formation pratique', 'date_debut' => '12/06/2020', 'date_fin' => '19/06/2020', 'nb_participants' => 19),
            array('ref' => 'form177', 'Titre' => 'Formation SOA', 'Description' => 'formation theorique', 'date_debut' => '03/12/2020', 'date_fin' => '10/12/2020', 'nb_participants' => 0),
            array('ref' => 'form178', 'Titre' => 'Formation Angular', 'Description' => 'formation theorique', 'date_debut' => '10/06/2020', 'date_fin' => '14/06/2020', 'nb_participants' => 12)
        );

        return $this->render("club/list.html.twig", array("tableau_formations" => $tab_formations, "classe" => $var1, "salle" => $var2));
    }


    //Question 3+4+5+6+7
    #[Route('/get/{nom}', name: 'get_name')]
    public function getName($nom)
    {
        return $this->render("club/detail.html.twig", ['nom_1' => $nom]);
    }



    //fin Question 3+4+5+6+7


    // FIN Exercice 1 : Twig et Affichage d’une variable   


    //fin Atelier3.0

}
