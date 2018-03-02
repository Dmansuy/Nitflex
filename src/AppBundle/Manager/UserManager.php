<?php
namespace AppBundle\Manager;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class UserManager extends Controller
{

    private $em;
    private $passwordEncoder;
    public function __construct(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->em = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
    }
    public function createUser(User $user)
    {
        $password = $this->passwordEncoder->encodePassword($user, $user->getPassword());
        $user->setPassword($password);
        $this->em->persist($user);
        $this->em->flush();
        return $user;
    }

    public function deleteList($prefer){
        $this->em->persist($prefer);
        $this->em->flush();
    }

    public function getUnUser($id)
    {
        return $this->em->getRepository(User::class)->find($id);
    }


}