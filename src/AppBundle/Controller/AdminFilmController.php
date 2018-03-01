<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Film;
use AppBundle\Form\FilmType;
use AppBundle\Manager\FilmManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;


class AdminFilmController extends Controller
{
    /**
     * @Route("/admin/films", name="admin_films")
     * @param  FilmManager $FilmManager
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexFilm(FilmManager $FilmManager)
    {
        $lesFilms = $FilmManager->getFilms();
        $this->generateUrl('admin_films');
        return $this->render('admin/film/index.html.twig', [
            'films' => $lesFilms]);
    }

    /**
     * @Route("/admin/films/show/{id}", name="admin_films_show")
     *
     * @param FilmManager $FilmManager
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showFilm(FilmManager $FilmManager, $id)
    {
        $Film = $FilmManager->getFilm($id);
        $this->generateUrl('admin_films_show', ['id' => $Film->getId()]);
        return $this->render('admin/film/show.html.twig', [
            'film' => $Film]);
    }

    /**
     * @Route("/admin/films/edit", name="admin_films_edit")
     */

    public function editFilm(Request $request)
    {
        $this->generateUrl('admin_films_edit');
        return $this->render('admin/film/edit.html.twig', []);
    }

    /**
     * @Route("/admin/films/new", name="admin_films_new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */

    public function newFilm(Request $request, FilmManager $filmManager)
    {
        $film = new Film();
        $form = $this->createForm(FilmType::class, $film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $file */
            $file = $film->getAffiche();
            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            // moves the file to the directory where  brochures are stored
            $file->move(
                $this->getParameter('affiches_directory'),
                $fileName
            );
            $film->setAffiche($fileName);
            $filmManager->addFilm($film = $form->getData());
            return $this->redirectToRoute('admin_films');
        }
        $this->generateUrl('admin_films_new');
        return $this->render('admin/film/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }

    /**
     * @Route("/Admin/films/delete/{id}", name="admin_films_delete")
     * @param FilmManager $CategoryFilm
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteCategory(FilmManager $FilmManager, $id)
    {
        $film = $FilmManager->getFilm($id);
        $this->generateUrl('admin_films_delete', ['id' => $film->getId()]);
        $FilmManager->deleteFilm($film);
        return $this->redirectToRoute('admin_films');
    }


}