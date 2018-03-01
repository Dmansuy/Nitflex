<?php
/**
 * Created by IntelliJ IDEA.
 * User: dmansuy
 * Date: 23/02/2018
 * Time: 15:42
 */

namespace AppBundle\Controller;


use AppBundle\Manager\FilmManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Manager\UserManager;
use AppBundle\Manager\CategoryManager;

class PreferController extends Controller
{

    /**
     * @Route("/film/prefer_list/{id}", name="prefer_list")
     * @param UserManager $userManager
     * @param FilmManager $filmManager
     * @param CategoryManager $categoryManager
     */
    public function preferList(UserManager $userManager,FilmManager $filmManager,CategoryManager $categoryManager ,$id)
    {
        $user = $userManager->getUnUser($id);
        $film = $user->getFilms();
        $userInSession = $this->getUser();
        $Categories = $categoryManager->getCategories();
        return $this->render('films/listPrefer.html.twig', [
            'films' => $film,
            'listeCategories' => $Categories,
            'userInSession' => $userInSession,
        ]);
    }
    /**
     * @Route("/film/prefer_list_add/{id}", name="prefer_list_add")
     * @param UserManager $userManager
     * @param FilmManager $filmManager
     */
    public function addList(UserManager $userManager,FilmManager $filmManager,$id)
    {

        $userInSession = $this->getUser();
        $film = $filmManager->getFilm($id);
        $this->generateUrl('prefer_list_add', ['id' => $film->getId()]);
        $user = $userInSession->addFilm($film);
        $userManager->createUser($user);
        $this->redirect('films_list');
        return $this->render('films/listPrefer.html.twig', [
            'films' => $film,
            'userInSession' => $userInSession,
        ]);

    }

}