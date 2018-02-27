<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cast
 *
 * @ORM\Table(name="cast")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CastRepository")
 */
class Cast
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
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     * @ORM\Column(name="nickname", type="string", length=255, nullable=true)
     */
    private $nickname;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Film")
     */
    private $films;

    /**
     * Get id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     * @param string $firstName
     * @return Cast
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     * @param string $lastName
     * @return Cast
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Get lastName
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set nickname
     * @param string $nickname
     * @return Cast
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
        return $this;
    }

    /**
     * Get nickname
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }
}

