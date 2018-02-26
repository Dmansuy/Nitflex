<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Film;
use AppBundle\Form\FilmType;
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
        $film = new Film();
        $form = $this->createForm(FilmType::class, $film );
        $form->handleRequest( $request );

        if ($form->isSubmitted() && $form->isValid()) {
            $film = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist( $film );
            $em->flush();
            return $this->redirectToRoute( 'admin_films');
        }

        $this->generateUrl( 'admin_films_new');
        return $this->render('admin/film/new.html.twig', [
            'form' => $form->createView()
            ]);
    }
    /**
     * @Route("/Admin/films/delete/{id}", name="admin_films_delete")
     * @param  FilmManager $FilmManager
     */
    public function deleteCategory (FilmManager $FilmManager, $id){
        $film = $FilmManager->getFilm($id);
        $this->generateUrl( 'admin_films_delete',['id' => $film->getId()]);
        $FilmManager->deleteFilm($film);
        return $this->redirectToRoute( 'admin_films');
    }


}