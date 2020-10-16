<?php

namespace App\Controller;

use App\Entity\Campus;
use App\Form\CampusType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CampusController extends AbstractController
{
    /**
     * @Route ("/campus", name="campus")
     */
    public function campus(EntityManagerInterface $em, Request $request)
    {
        /**Affiche les campus de la base de donnée **/

        $campusRep = $this->getDoctrine()->getRepository(Campus::class);
        $campuses = $campusRep->findAll();




        return $this->render('campus/campus.html.twig', [
            "campuses"=>$campuses,
        ]);
    }

    /**
     * @Route ("/campus/addCampus", name="addCampus")
     */
    public function addCampus(EntityManagerInterface $em, Request $request)
    {
        $campus = new Campus();
        $campusForm = $this->createForm(CampusType::class, $campus);

        $campusForm->handleRequest($request);
        if($campusForm->isSubmitted() && $campusForm->isValid())
        {
            $em->persist($campus);
            $em->flush();
            return $this->redirectToRoute('campus', [
                "campusForm"=> $campusForm->createView()]);
        }

        return $this->render('campus/addCampus.html.twig', [
            "campusForm"=> $campusForm->createView()
        ]);
    }

    /**
     * @Route ("/campus/modify/{id}", name="modifyCampus")
     */
    public function modifyCampus(Request $request, int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $campus = $em->getRepository(Campus::class)->find($id);
        $modifyForm = $this->createForm(CampusType::class, $campus);
        $modifyForm->handleRequest($request);

        if($modifyForm->isSubmitted() && $modifyForm->isValid())
        {
            $em->flush();
            return $this->redirectToRoute('campus');
        }
        return $this->render('campus/modifyCampus.html.twig', [
            "modifyForm"=> $modifyForm->createView()
        ]);
    }

    /**
     * @Route ("/campus/delete/{id}", name="deleteCampus")
     *
     */
    public function deleteCampus(EntityManagerInterface $em, int $id): Response
    {


        $em = $this->getDoctrine()->getManager();
        $campus = $em->getRepository(Campus::class)->find($id);
        $em->remove($campus);
        $em->flush();

        $campusRep = $this->getDoctrine()->getRepository(Campus::class);
        $campuses = $campusRep->findAll();

        return $this->render('campus/campus.html.twig', [
            "campuses"=>$campuses
        ]);
    }
}
