<?php
namespace AppBundle\Manager;

use AppBundle\Entity\Cast;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;

class CastManager extends Controller
{

    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getCasts()
    {
        var_dump('coucou');
        return $this->em->getRepository(Cast::class)->findAll();
    }

    public function getCast($id)
    {
        return $this->em->getRepository(Cast::class)->find($id);
    }

    public function deleteCast($cast){
        $this->em->remove($cast);
        $this->em->flush();
    }
}