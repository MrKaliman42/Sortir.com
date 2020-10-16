<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\ParticipantFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ParticipantController extends AbstractController
{


    /**
     * @Route ("/connection", name="connection")
     */
    public function connection()
    {
        return $this->render('connection/connection.html.twig');
    }

    /**
     * @Route ("/monProfil", name="monProfil")
     */
    public function monProfil(Request $request)
    {
        /**Affiche les campus de la base de donnée **/

        //$monProfilRep = $this->getDoctrine()->getRepository(Participant::class);
        //$monProfil = $monProfilRep->find($id);


        return $this->render('participant/monProfil.html.twig');
    }

    /**
    * @Route ("/Profil/{id}", name="profil",
     *     requirements={"id":"\d+"},
     *     methods={"GET"})
    */
    public function profil($id, Request $request, EntityManagerInterface $em)
    {
        $profilRep = $this->getDoctrine()->getRepository(Participant::class);
        $profil = $profilRep->find($id);
        return $this->render('participant/profil.html.twig', [
            "profile" => $profil,
        ]);
    }

    /**---------------------------------------------------------------------------------------------------**/

    /**
     * @Route ("/register", name="register")
     */
    public function register(EntityManagerInterface $em, Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $participant = new Participant();
        $participant->setAdministrator(false);
        $participant->setActive(true);
        $registerForm = $this->createForm(ParticipantFormType::class,$participant);

        $registerForm->handleRequest($request);
        if ($registerForm->isSubmitted() && $registerForm->isValid()) {
            //Hasher le mot de passe
            $hashed = $passwordEncoder->encodePassword($participant, $participant->getPassword());
            $participant->setPassword($hashed);

            $em->persist($participant);
            $em->flush();
            return $this->redirectToRoute("register");
        } else {


            return $this->render('participant/register.html.twig', [
                "registerForm" => $registerForm->createView()
            ]);
        }

    }


}
