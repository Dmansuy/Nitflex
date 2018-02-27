<?php
/**
 * Created by IntelliJ IDEA.
 * User: dmansuy
 * Date: 23/02/2018
 * Time: 14:23
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Film;
use AppBundle\Manager\CategoryManager;
use AppBundle\Manager\FilmManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;





class FilmController extends Controller
{
    /**
     * @Route("/films", name="films_list")
     *
     * @param FilmManager $filmManager
     * @param CategoryManager $categoryManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(FilmManager $filmManager,CategoryManager $categoryManager)
    {
        $films = $filmManager->getFilms();
        $Categories = $categoryManager->getCategories();
        $this->generateUrl('films_list');
        return $this->render('films/listAll.html.twig', [
            'film' => $films,
            'listeCategories' => $Categories
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

    /**
     * @Route("/films/categories/{id}", name="la_categorie")
     * @param CategoryManager $categoryManager
     * @param FilmManager $filmManager
     */

    public function FilmByCategory(FilmManager $filmManager,CategoryManager $categoryManager,$id)
    {
        $films = $filmManager->getFilmByCategory($id);
        $Categories = $categoryManager->getCategories();
        $Categorie = $categoryManager->getCategory($id);
        $this->generateUrl('la_categorie',['id' => $Categorie->getId()]);
        return $this->render('films/listAll.html.twig', [
            'film' => $films,
            'categorie' => $Categorie,
            'listeCategories' => $Categories,
        ]);
    }
}