<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Manager\CategoryManager;
use AppBundle\Entity\Category;
class AdminCategorieController extends Controller
{
    /**
     * @Route("/Admin/categories", name="admin_categories")
     * @param  CategoryManager $CategoryManager
     */
    public function indexCategorie(CategoryManager $CategoryManager)
    {
        $lesCategories = $CategoryManager->getCategories();
        $this->generateUrl( 'admin_categories');
        return $this->render('admin/categorie/index.html.twig', [
            'categories' => $lesCategories ]);
    }
    /**
     * @Route("/Admin/categories/show/{id}", name="admin_categories_show")
     * @param  CategoryManager $CategoryManager
     */
    public function showCategorie(CategoryManager $CategoryManager,$id)
    {
        $category = $CategoryManager->getCategory($id);
        $this->generateUrl( 'admin_categories_show',['id' => $category->getId()]);
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