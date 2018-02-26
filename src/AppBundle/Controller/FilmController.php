<?php
/**
 * Created by IntelliJ IDEA.
 * User: dmansuy
 * Date: 23/02/2018
 * Time: 14:23
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Film;
use AppBundle\Manager\FilmManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;





class FilmController extends Controller
{
    /**
     * @Route("/films", name="films_list")
     *
     * @param FilmManager $filmManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(FilmManager $filmManager)
    {
        $films = $filmManager->getFilms();
        return $this->render('films/listAll.html.twig', [
            'film' => $films
        ]);
    }

    /**
     * @Route("/films/{id}", name="films_details")
     *
     * @param FilmManager $filmManager
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showDetailsAction(FilmManager $filmManager, int $id)
    {
        $film = $filmManager->getFilm($id);
        $this->generateUrl('films_details', ['id' => $film->getId()]);
        return $this->render('films/details.html.twig', [
            'film' => $film
        ]);
    }
}