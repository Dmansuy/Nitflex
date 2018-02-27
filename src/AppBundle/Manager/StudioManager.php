<?php
namespace AppBundle\Manager;

use AppBundle\Entity\Category;
use AppBundle\Entity\Studio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;

class StudioManager extends Controller
{

    private $em;

    public function __construct(EntityManagerInterface $entityManager)

    {
        $this->em = $entityManager;
    }

    public function getStudios()
    {
        return $this->em->getRepository(Studio::class)->findAll();
    }

    public function getStudio($id)
    {
        return $this->em->getRepository(Studio::class)->find($id);
    }

    public function deleteStudio($studio){
        $this->em->remove($studio);
        $this->em->flush();
    }
}