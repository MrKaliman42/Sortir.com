<?php

namespace App\Controller;

use App\Entity\City;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CityController extends AbstractController
{
    /**
     * @Route ("/city", name="city")
     */
    public function campus(EntityManagerInterface $em, Request $request)
    {
        /**Affiche les campus de la base de donnée **/

        $cityRep = $this->getDoctrine()->getRepository(City::class);
        $cities = $cityRep->findAll();




        return $this->render('city/cities.html.twig', [
            "cities"=>$cities,
        ]);
    }
}
