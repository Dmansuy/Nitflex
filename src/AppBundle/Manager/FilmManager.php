<?php
namespace AppBundle\Manager;

use AppBundle\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;
class FilmManager extends Controller
{

    private $em;

    public function __construct(EntityManagerInterface $entityManager)

    {

        $this->em = $entityManager;

    }

    public function getFilms()
    {
        return $this->em->getRepository(Film::class)->findAll();
    }

    public function getFilm($id)
    {
        return $this->em->getRepository(Film::class)->find($id);
    }
}