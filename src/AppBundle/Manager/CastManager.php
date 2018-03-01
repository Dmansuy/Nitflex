<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Cast;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CastManager extends Controller
{

    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getCasts()
    {
        return $this->em->getRepository(Cast::class)->findAll();
    }

    public function getCast($id)
    {
        return $this->em->getRepository(Cast::class)->find($id);
    }

    public function deleteCast($cast)
    {
        $this->em->remove($cast);
        $this->em->flush();
    }

    public function addCast($cast)
    {
        $this->em->persist($cast);
        $this->em->flush();
        return $cast;
    }
}