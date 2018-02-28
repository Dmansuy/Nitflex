<?php
/**
 * Created by IntelliJ IDEA.
 * User: dmansuy
 * Date: 23/02/2018
 * Time: 14:23
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Film;
use AppBundle\Form\FilmType;
use AppBundle\Manager\CategoryManager;
use AppBundle\Manager\FilmManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


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
            'categorie' => "",
            'listeCategories' => $Categories
        ]);
    }

    /**
     * @Route("/films/{id}", name="films_details")
     * @param CategoryManager $categoryManager
     * @param FilmManager $filmManager
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showDetailsAction(FilmManager $filmManager,CategoryManager $categoryManager, int $id)
    {
        $film = $filmManager->getFilm($id);
        $Categories = $categoryManager->getCategories();
        $this->generateUrl('films_details', ['id' => $film->getId()]);
        return $this->render('films/details.html.twig', [
            'listeCategories' => $Categories,
            'categorie' => "",
            'film' => $film
        ]);
    }

    /**
     * @Route("/films/categories/{id}", name="la_categorie")
     * @param FilmManager $filmManager
     * @param CategoryManager $categoryManager
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function FilmByCategory(FilmManager $filmManager,CategoryManager $categoryManager,$id)
    {
        $films = $filmManager->getFilmByCategory($id);
        $categories = $categoryManager->getCategories();
        $categorie = $categoryManager->getCategory($id);
        $this->generateUrl('la_categorie',['id' => $categorie->getId()]);
        return $this->render('films/listAll.html.twig', [
            'film' => $films,
            'categorie' => $categorie,
            'listeCategories' => $categories,
        ]);
    }

    /**
     * @Route("/films/search", name="search_film")
     * @param FilmManager $filmManager
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function searchAction(FilmManager $filmManager, Request $request)
    {
        $film = $filmManager->getFilms();
        $form = $this->createForm(FilmType::class, $film);
        $form->handleRequest($request);
        $search = $filmManager->searchFilm($form->getData());
        return $this->render('films/search.html.twig', [
            'form' => $form
        ]);
    }
}