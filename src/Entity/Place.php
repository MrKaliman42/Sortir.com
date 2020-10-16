<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlaceRepository::class)
 */
class Place
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
    private $placeName;

    /**
     * @ORM\Column (type="string", length=30, nullable=true)
     */
    private $street;

    /**
     * @ORM\Column (type="float", nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column (type="float", nullable=true)
     */
    private $longitude;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\Activity", mappedBy="placeA")
     */
    private $activitiesP;

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\City", inversedBy="placesC")
     */
    private $cityP;

    public function __construct()
    {
        $this->activitiesP = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getCityP()
    {
        return $this->cityP;
    }

    /**
     * @param mixed $cityP
     */
    public function setCityP($cityP): void
    {
        $this->cityP = $cityP;
    }



    /**
     * @return ArrayCollection
     */
    public function getActivitiesP(): ArrayCollection
    {
        return $this->activitiesP;
    }

    /**
     * @param ArrayCollection $activitiesP
     */
    public function setActivitiesP(ArrayCollection $activitiesP): void
    {
        $this->activitiesP = $activitiesP;
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
    public function getPlaceName()
    {
        return $this->placeName;
    }

    /**
     * @param mixed $placeName
     */
    public function setPlaceName($placeName): void
    {
        $this->placeName = $placeName;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street): void
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude): void
    {
        $this->longitude = $longitude;
    }



}
