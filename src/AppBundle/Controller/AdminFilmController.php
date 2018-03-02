<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Film;
use AppBundle\Form\FilmType;
use AppBundle\Form\ImportType;
use AppBundle\Manager\FilmManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;


class AdminFilmController extends Controller
{
    /**
     * @Route("/admin/films", name="admin_films")
     * @param  FilmManager $filmManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexFilm(FilmManager $filmManager)
    {
        $films = $filmManager->getFilms();
        $this->generateUrl('admin_films');
        return $this->render('admin/film/index.html.twig', [
            'films' => $films]);
    }

    /**
     * @Route("/admin/films/show/{id}", name="admin_films_show")
     * @param FilmManager $filmManager
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showFilm(FilmManager $filmManager, $id)
    {
        $film = $filmManager->getFilm($id);
        $this->generateUrl('admin_films_show', ['id' => $film->getId()]);
        return $this->render('admin/film/show.html.twig', [
            'film' => $film
        ]);
    }

    /**
     * @Route("/admin/films/edit/{id}", name="admin_films_edit", requirements={"film" = "\d+"})
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editFilm(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var Film $film */
        $film = $em->getRepository(Film::class)->find($id);
        $film->setAffiche(null);
        $form = $this->createForm(FilmType::class, $film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $film = $form->getData();
            $em->persist($film);
            $em->flush();
            return $this->redirectToRoute('admin_films');
        }

        $this->generateUrl('admin_films_edit', [
            'id' => $film->getId()
        ]);
        return $this->render('admin/film/edit.html.twig', array('form' => $form->createView()));
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
            $file->move(
                $this->getParameter('affiches_directory'),
                $fileName
            );
            $film->setAffiche($fileName);
            $filmManager->addFilm($film = $form->getData());
            return $this->redirectToRoute('admin_films');
        }
        $this->generateUrl('admin_films_new');
        return $this->render('admin/film/new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }

    /**
     * @Route("/admin/films/delete/{id}", name="admin_films_delete")
     * @param FilmManager $CategoryFilm
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteFilm(FilmManager $filmManager, $id)
    {
        $film = $filmManager->getFilm($id);
        $this->generateUrl('admin_films_delete', [
            'id' => $film->getId()
        ]);
        $filmManager->deleteFilm($film);
        return $this->redirectToRoute('admin_films');
    }

    /**
     * @Route("/admin/films/import", name="import_films")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function importAction()
    {
        $films = [];
        $row = 0;
        if(($handle = fopen($this->getParameter('csv_directory') . "/import.csv", "r")) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                $num = count($data);
                $row++;
                for ($c = 0; $c < $num; $c++) {
                    $films[$row] = array(
                        "category" => $data[0],
                        "studio" => $data[1],
                        "title" => $data[2],
                        "year" => $data[3],
                        "description" => $data[4],
                        "age" => $data[5],
                        "time" => $data[6],
                        "affiche" => $data[7]
                    );
                }
            }
            fclose($handle);
        }
        $em = $this->getDoctrine()->getManager();
        foreach ($films as $film )
        {
            $film = new Film();
            $film
                ->setCategory($film[0])
                ->setStudio($film[1])
                ->setTitle($film[2])
                ->setYear($film[3])
                ->setDescription($film[4])
                ->setAge($film[5])
                ->setTime($film[6])
                ->setAffiche($film[7]);

            $em->persist($film);
        }
        $em->flush();
        return $this->redirectToRoute('admin_films');
    }
}