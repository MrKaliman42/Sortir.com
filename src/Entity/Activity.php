<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActivityRepository::class)
 */
class Activity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column (type="string", length=30)
     */
    private $name;

    /**
     * @ORM\Column (type="datetime")
     */
    private $startDate;

    /**
     * @ORM\Column (type="integer", nullable=true)
     */
    private $duration;

    /**
     * @ORM\Column (type="datetime")
     */
    private $endDate;

    /**
     * @ORM\Column (type="integer")
     */
    private $inscriptionNbMax;

    /**
     * @ORM\Column (type="text", nullable=true)
     */
    private $descriptionInfo;

    /**
     * @ORM\Column (type="integer", nullable=true)
     */
    private $activityStatut;

    /**
     * @ORM\Column (type="string", length=255, nullable=true)
     */
    private $urlPhoto;

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\Participant", inversedBy="activities")
     */
    private $organizer;

    /**
     * @ORM\ManyToMany (targetEntity="App\Entity\Participant", inversedBy="activitiesP")
     */
    private $participants;

    public function __construct()
    {
        $this ->participants = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\Campus", inversedBy="activitiesC")
     */
    private $campusA;

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\Status", inversedBy="activitiesS")
     */
    private $statusA;

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\Place", inversedBy="activitiesP")
     */
    private $placeA;

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\City", inversedBy="activityCity")
     */
    private $cityA;

    /**
     * @return mixed
     */
    public function getPlaceA()
    {
        return $this->placeA;
    }

    /**
     * @param mixed $placeA
     */
    public function setPlaceA($placeA): void
    {
        $this->placeA = $placeA;
    }

    /**
     * @return mixed
     */
    public function getCityA()
    {
        return $this->cityA;
    }

    /**
     * @param mixed $cityA
     */
    public function setCityA($cityA): void
    {
        $this->cityA = $cityA;
    }



    /**
     * @return mixed
     */
    public function getStatusA()
    {
        return $this->statusA;
    }

    /**
     * @param mixed $statusA
     */
    public function setStatusA($statusA): void
    {
        $this->statusA = $statusA;
    }



    /**
     * @return mixed
     */
    public function getCampusA()
    {
        return $this->campusA;
    }

    /**
     * @param mixed $campusA
     */
    public function setCampusA($campusA): void
    {
        $this->campusA = $campusA;
    }



    /**
     * @return ArrayCollection
     */
    public function getParticipants(): ArrayCollection
    {
        return $this->participants;
    }

    /**
     * @param ArrayCollection $participants
     */
    public function setParticipants(ArrayCollection $participants): void
    {
        $this->participants = $participants;
    }

    /**
     * @return mixed
     */
    public function getOrganizer()
    {
        return $this->organizer;
    }

    /**
     * @param mixed $organizer
     */
    public function setOrganizer($organizer): void
    {
        $this->organizer = $organizer;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getInscriptionNbMax()
    {
        return $this->inscriptionNbMax;
    }

    /**
     * @param mixed $inscriptionNbMax
     */
    public function setInscriptionNbMax($inscriptionNbMax): void
    {
        $this->inscriptionNbMax = $inscriptionNbMax;
    }

    /**
     * @return mixed
     */
    public function getDescriptionInfo()
    {
        return $this->descriptionInfo;
    }

    /**
     * @param mixed $descriptionInfo
     */
    public function setDescriptionInfo($descriptionInfo): void
    {
        $this->descriptionInfo = $descriptionInfo;
    }

    /**
     * @return mixed
     */
    public function getActivityStatut()
    {
        return $this->activityStatut;
    }

    /**
     * @param mixed $activityStatut
     */
    public function setActivityStatut($activityStatut): void
    {
        $this->activityStatut = $activityStatut;
    }

    /**
     * @return mixed
     */
    public function getUrlPhoto()
    {
        return $this->urlPhoto;
    }

    /**
     * @param mixed $urlPhoto
     */
    public function setUrlPhoto($urlPhoto): void
    {
        $this->urlPhoto = $urlPhoto;
    }


}
