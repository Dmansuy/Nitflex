<?php
namespace AppBundle\Manager;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;

class UserManager extends Controller
{

    private $em;

    public function __construct(EntityManagerInterface $entityManager)

    {
        $this->em = $entityManager;
    }

    public function getLesUsers()
    {
        return $this->em->getRepository(User::class)->findAll();
    }

    public function getUnUser($id)
    {
        return $this->em->getRepository(User::class)->find($id);
    }

    public function deleteUser($film){
        $this->em->remove($film);
        $this->em->flush();
    }
}