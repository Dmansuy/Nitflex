<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FilmRepository")
 */
class Film
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     * @ORM\Column(name="year", type="datetime")
     */
    private $year;

    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(name="age", type="string", length=255)
     */
    private $age;


    /**
     * @var string
     * @ORM\Column(name="time", type="string", length=255)
     */
    private $time;

    /**
     * @var string
     * @ORM\Column(name="affiche", type="string", length=255)
     */
    private $affiche;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category", inversedBy="film")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Cast")
     */
    private $casts;
    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Studio", inversedBy="films")
     * @ORM\JoinColumn(nullable=false)
     */
    private $studio;

    /**
     * Get id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     * @param string $title
     * @return Film
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set year
     * @param \DateTime $year
     * @return Film
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * Get year
     * @return \DateTime
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set description
     * @param string $description
     * @return Film
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    /**
     * Set time
     * @param string $time
     * @return Film
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }
    /**
     * Set age
     * @param string $age
     * @return Film
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }
    /**
     * Get description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Get time
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }   /**
    * Get age
    * @return string
    */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set category
     * @param \AppBundle\Entity\Category $category
     * @return Film
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set affiche
     * @param string $affiche
     * @return Film
     */
    public function setAffiche($affiche)
    {
        $this->affiche = $affiche;
        return $this;
    }

    /**
     * Get affiche
     * @return string
     */
    public function getAffiche()
    {
        return $this->affiche;
    }


    /**
     * @return mixed
     */
    public function getStudio()
    {
        return $this->studio;
    }

    /**
     * @param mixed $studio
     */
    public function setStudio($studio)
    {
        $this->studio = $studio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCasts()
    {
        return $this->casts;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->casts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cast
     * @param \AppBundle\Entity\Cast $cast
     * @return Film
     */
    public function addCast(\AppBundle\Entity\Cast $cast)
    {
        $this->casts[] = $cast;

        return $this;
    }

    /**
     * Remove cast
     * @param \AppBundle\Entity\Cast $cast
     */
    public function removeCast(\AppBundle\Entity\Cast $cast)
    {
        $this->casts->removeElement($cast);
    }



    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->user;
    }


    /**
     * Add user
     * @param \AppBundle\Entity\User $user
     * @return Film
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }
}
