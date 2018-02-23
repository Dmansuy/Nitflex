<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminFilmController extends Controller
{
    /**
     * @Route("/Admin/films", name="admin_films")
     */
    public function indexFilm(Request $request)
    {
        $this->generateUrl( 'admin_films');
        return $this->render('admin/film/index.html.twig', [ ]);
    }
    /**
     * @Route("/Admin/films/show", name="admin_films_show")
     */
    public function showFilm(Request $request)
    {

        $this->generateUrl( 'admin_films_show');
        return $this->render('admin/film/show.html.twig', [ ]);
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