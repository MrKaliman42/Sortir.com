<?php

namespace App\Controller;

use App\Entity\Participant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Controller extends AbstractController
{
    /**
     * @Route("/Accueil", name="home")
     */
    public function home()
    {

        return $this->render("main/home.html.twig", [

        ]);

    }
    /**
     * @Route("/", name="home_default")
     */
    public function homeDefault()
    {
        return $this->render("main/home.html.twig");

    }

}
