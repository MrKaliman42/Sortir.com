<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Entity\Participant;
use App\Form\ActivityType;
use App\Repository\ActivityRepository;
use App\Repository\EtatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    /**
     * @Route("/creerSortie", name="AjoutSortie")
     */
    public function ajoutSortie(EntityManagerInterface $em, Request $request)
    {
        $user = $this->getUser();
        $activity = new Activity();
        $activity ->setOrganizer($user);
        $activity ->setActivityStatut('créer');
        $activityForm = $this->createForm(ActivityType::class, $activity);


        $activityForm->handleRequest($request);
        if($activityForm->isSubmitted() && $activityForm->isValid())
        {
            $em->persist($activity);
            $em->flush();
            return $this->redirectToRoute('home');

        }

        return $this->render('sortie/ajoutSortie.html.twig', [
            "activityForm" => $activityForm->createView()
        ]);
    }

    /**
     * @Route ("/Sortie", name="sortie")
     * @param EntityManagerInterface $em
     * @param Request $request
     * @param ActivityRepository $activityRepositoryRep
     * @return Response
     */
    public function sortie(EntityManagerInterface $em, Request $request, ActivityRepository $activityRepositoryRep, int $id)
    {
        $profilRep = $this->getDoctrine()->getRepository(Participant::class);
        $profil = $profilRep->find($id);
        //$participants = new ArrayCollection();
       //$partRepo = $this->getDoctrine()->getRepository(Activity::class);
       //$participant=$partRepo->count([$participants]);
       $activitiesRep = $this->getDoctrine()->getRepository(Activity::class);
       $activities = $activitiesRep->findAll();

       return $this->render('sortie/sortie.html.twig', [
          "activities"=>$activities,
           "profile"=>$profil
           //"participant"=>$participant
       ]);
    }

}
