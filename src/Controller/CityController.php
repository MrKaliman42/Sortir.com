<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CityController extends AbstractController
{
    /**
     * @Route ("/city", name="city")
     */
    public function campus(EntityManagerInterface $em, Request $request)
    {
        /**Affiche les campus de la base de donnée **/

        $cityRep = $this->getDoctrine()->getRepository(Campus::class);
        $cityes = $cityRep->findAll();




        return $this->render('campus/campus.html.twig', [
            "campuses"=>$cityes,
        ]);
    }
}
