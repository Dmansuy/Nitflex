<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminCategorieController extends Controller
{
    /**
     * @Route("/Admin/categories", name="admin_categories")
     */
    public function indexCategorie(Request $request)
    {
        $this->generateUrl( 'admin_categories');
        return $this->render('admin/categorie/index.html.twig', [ ]);
    }
    /**
     * @Route("/Admin/categories/show", name="admin_categories_show")
     */
    public function showCategorie(Request $request)
    {

        $this->generateUrl( 'admin_categories_show');
        return $this->render('admin/categorie/show.html.twig', [ ]);
    }

    /**
     * @Route("/Admin/categories/edit", name="admin_categories_edit")
     */

    public function editCategorie(Request $request)
    {
        $this->generateUrl( 'admin_categories_edit');
        return $this->render('admin/categorie/edit.html.twig', [ ]);
    }

    /**
     * @Route("/Admin/categories/new", name="admin_categories_new")
     */

    public function newCategorie(Request $request)
    {
        $this->generateUrl( 'admin_categories_new');
        return $this->render('admin/categorie/new.html.twig', [ ]);
    }

}