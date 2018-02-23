<?php
/**
 * Created by IntelliJ IDEA.
 * User: dmansuy
 * Date: 23/02/2018
 * Time: 14:23
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Film;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Tests\Controller;

class FilmController extends Controller
{
    /**
     * @Route("/films", name="films_list")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $projects = $em->getRepository(Film:: class)->findAll();
        return $this->render('films/listAll.html.twig', [
            'projects' => $projects
        ]);
    }

    /**
     * @Route("/films/{id}", name="films_listCat", requirements={"id"="\d+"})
     */
    public function listMoviesByCatAction(int $id)
    {
        /*$em = $this->getDoctrine()->getManager();
        $film = $em->getRepository(Film:: class)
            ->find($id);
        return $this->render( 'films/listByCat.html.twig', [
            'film' => $film
        ]);*/
    }
}