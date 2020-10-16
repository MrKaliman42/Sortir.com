<?php

namespace App\Entity;

use App\Repository\CampusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CampusRepository::class)
 */
class Campus
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
    private $campusName;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\Activity", mappedBy="campusA")
     */
    private $activitiesC;


    /**
     * @ORM\OneToMany (targetEntity="App\Entity\Participant", mappedBy="campusP")
     */
    private $particpantsC;


    public  function __construct() {
        $this->activitiesC = new ArrayCollection();
        $this->particpantsC = new ArrayCollection();
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
    public function getCampusName()
    {
        return $this->campusName;
    }

    /**
     * @param mixed $campusName
     */
    public function setCampusName($campusName): void
    {
        $this->campusName = $campusName;
    }



}
