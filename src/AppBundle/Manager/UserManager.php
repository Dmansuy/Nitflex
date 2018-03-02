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

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->em->getRepository(User::class)->findAll();
    }

    /**
     * @param User $user
     * @return User
     */
    public function createUser(User $user)
    {
        $password = $this->passwordEncoder->encodePassword($user, $user->getPassword());
        $user->setPassword($password);
        $this->em->persist($user);
        $this->em->flush();
        return $user;
    }
  
    public function deleteUser($user)
    {
        $this->em->remove($user);
        $this->em->flush();
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