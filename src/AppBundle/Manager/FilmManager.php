<?php
namespace AppBundle\Manager;

use AppBundle\Entity\Film;
use AppBundle\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;


/**
 * Class FilmManager
 *
 * @package AppBundle\Manager
 */
class FilmManager extends Controller
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * FilmManager constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @return array
     */
    public function getFilms()
    {
        return $this->em->getRepository(Film::class)->findAll();
    }

    /**
     * @param $id
     * @return object
     */
    public function getFilm($id)
    {
        return $this->em->getRepository(Film::class)->find($id);
    }

    /**
     * @param $id
     * @return array
     */
    public function getFilmByCategory($id)
    {
        $query =  $this->em->createQuery('SELECT f
        FROM AppBundle:Film f
        WHERE f.category = :id '
        )->setParameter('id', $id);
        return $query->getResult();
    }

    /**
     * @param $film
     */
    public function deleteFilm($film){
        $this->em->remove($film);
        $this->em->flush();
    }

    /**
     * @param $search
     * @return array
     */
    public function searchFilms($search)
    {
        /** @var FilmRepository $filmRepository */
        $filmRepository = $this->em->getRepository(Film::class);
        return $filmRepository->searchFilms($search);
    }

    public function addFilm($film){
        $this->em->persist($film);
        $this->em->flush();
        return $film;
    }
}