<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatusRepository::class)
 */
class Status
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
    private $libelle;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\Activity", mappedBy="statusA")
     */
    private $activitiesS;

    public function __construct()
    {
        $this->activitiesS = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getActivitiesS(): ArrayCollection
    {
        return $this->activitiesS;
    }

    /**
     * @param ArrayCollection $activitiesS
     */
    public function setActivitiesS(ArrayCollection $activitiesS): void
    {
        $this->activitiesS = $activitiesS;
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
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle): void
    {
        $this->libelle = $libelle;
    }




}
