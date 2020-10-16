<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
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
    private $cityName;

    /**
     * @ORM\Column (type="string", length=10)
     */
    private $zipCode;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\Place", mappedBy="cityP")
     */
    private $placesC;

    /**
     * @ORM\OneToMany (targetEntity="App\Entity\Activity", mappedBy="cityA")
     */
    private $activityCity;

    public function __construct()
    {
        $this->placesC = new ArrayCollection();
        $this->activityCity = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getPlacesC(): ArrayCollection
    {
        return $this->placesC;
    }

    /**
     * @param ArrayCollection $placesC
     */
    public function setPlacesC(ArrayCollection $placesC): void
    {
        $this->placesC = $placesC;
    }

    /**
     * @return ArrayCollection
     */
    public function getActivityCity(): ArrayCollection
    {
        return $this->activityCity;
    }

    /**
     * @param ArrayCollection $activityCity
     */
    public function setActivityCity(ArrayCollection $activityCity): void
    {
        $this->activityCity = $activityCity;
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
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * @param mixed $cityName
     */
    public function setCityName($cityName): void
    {
        $this->cityName = $cityName;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $zipCode
     */
    public function setZipCode($zipCode): void
    {
        $this->zipCode = $zipCode;
    }



}
