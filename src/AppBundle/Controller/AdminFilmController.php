<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Film;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Manager\FilmManager;
class AdminFilmController extends Controller
{
    /**
     * @Route("/Admin/films", name="admin_films")
     * @param  FilmManager $FilmManager
     */
    public function indexFilm(FilmManager $FilmManager)
   {
        $lesFilms = $FilmManager->getFilms();
        $this->generateUrl( 'admin_films');
        return $this->render('admin/film/index.html.twig', [
            'films' => $lesFilms ]);
    }
    /**
     * @Route("/Admin/films/show/{id}", name="admin_films_show")
     * @param  FilmManager $FilmManager
     */
    public function showFilm(FilmManager $FilmManager, $id)
    {
        $Film = $FilmManager->getFilm($id);
        $this->generateUrl( 'admin_films_show', ['id' => $Film->getId()]);
        return $this->render('admin/film/show.html.twig', [
            'film' => $Film ]);
    }

    /**
     * @Route("/Admin/films/edit", name="admin_films_edit")
     */

    public function editFilm(Request $request)
    {
        $this->generateUrl( 'admin_films_edit');
        return $this->render('admin/film/edit.html.twig', [ ]);
    }

    /**
     * @Route("/Admin/films/new", name="admin_films_new")
     */

    public function newFilm(Request $request)
    {
        $this->generateUrl( 'admin_films_new');
        return $this->render('admin/film/new.html.twig', [ ]);
    }

}