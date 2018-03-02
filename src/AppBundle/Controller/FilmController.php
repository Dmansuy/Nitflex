<?php
/**
 * Created by IntelliJ IDEA.
 * User: dmansuy
 * Date: 23/02/2018
 * Time: 14:23
 */

namespace AppBundle\Controller;


use AppBundle\Form\ResearchType;
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
    public function indexAction(FilmManager $filmManager,CategoryManager $categoryManager, Request $request)
    {
        $films = $filmManager->getFilms();
        $categories = $categoryManager->getCategories();
        $userInSession = $this->getUser();
        $this->generateUrl('films_list');
        return $this->render('films/listAll.html.twig', [
            'film' => $films,
            'categorie' => "",
            'listCategories' => $categories
             'userInSession' => $userInSession
        ]);
    }

    /**
     * @Route("/films/details/{id}", name="films_details")
     * @param CategoryManager $categoryManager
     * @param FilmManager $filmManager
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showDetailsAction(FilmManager $filmManager,CategoryManager $categoryManager, int $id)
    {
        $film = $filmManager->getFilm($id);
        $categories = $categoryManager->getCategories();
        $userInSession = $this->getUser();
        $this->generateUrl('films_details', ['id' => $film->getId()]);
        return $this->render('films/details.html.twig', [
            'listCategories' => $categories,
            'categorie' => "",
            'film' => $film,
            'userInSession' => $userInSession
        ]);
    }

    /**
     * @Route("/films/categories/{id}", name="la_categorie")
     * @param FilmManager $filmManager
     * @param CategoryManager $categoryManager
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function FilmByCategory(FilmManager $filmManager,CategoryManager $categoryManager, int $id)
    {
        $films = $filmManager->getFilmByCategory($id);
        $categories = $categoryManager->getCategories();
        $category = $categoryManager->getCategory($id);
        $this->generateUrl('la_categorie',['id' => $category->getId()]);
        return $this->render('films/listAll.html.twig', [
            'film' => $films,
            'categorie' => $category,
            'listCategories' => $categories,
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
        $films = [];

        $form = $this->createForm(ResearchType::class, $films);
        $form->handleRequest($request);
        $search = implode($form->getData());
        $films = $filmManager->searchFilms($search);
        return $this->render('films/search.html.twig', [
            'form' => $form->createView(),
            'films'=> $films,
            'categorie' => "",
            'listCategories' => ""
        ]);
    }
}