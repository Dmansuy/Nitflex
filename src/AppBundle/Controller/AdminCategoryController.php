<?php

namespace AppBundle\Controller;

use AppBundle\Form\CategoryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Manager\CategoryManager;
use AppBundle\Entity\Category;

class AdminCategoryController extends Controller
{
    /**
     * @Route("/admin/categories", name="admin_categories")
     * @param  CategoryManager $CategoryManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexCategory(CategoryManager $CategoryManager)
    {
        $categories = $CategoryManager->getCategories();
        $this->generateUrl('admin_categories');
        return $this->render('admin/category/index.html.twig', [
            'categories' => $categories]);
    }

    /**
     * @Route("/admin/categories/show/{id}", name="admin_categories_show")
     * @param CategoryManager $categoryManager
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showCategory(CategoryManager $categoryManager, $id)
    {
        $category = $categoryManager->getCategory($id);
        $this->generateUrl('admin_categories_show', ['id' => $category->getId()]);
        return $this->render('admin/category/show.html.twig', []);
    }

    /**
     * @Route("/admin/categories/edit/{id}", name="admin_categories_edit", requirements={"category" = "\d+"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editCategory(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository(Category::class)->find($id);
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('admin_categories');
        }
        $this->generateUrl('admin_categories_edit', [
            'id' => $category->getId()
        ]);
        return $this->render('admin/category/edit.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/admin/categories/new", name="admin_categories_new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public
    function newCategory(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('admin_categories');
        }
        $this->generateUrl('admin_categories_new');
        return $this->render('admin/category/new.html.twig', [
            'form' => $form->createView()]);
    }

    /**
     * @Route("/admin/categories/delete/{id}", name="admin_categories_delete")
     * @param CategoryManager $CategoryManager
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public
    function deleteCategory(CategoryManager $CategoryManager, $id)
    {
        $category = $CategoryManager->getCategory($id);
        $this->generateUrl('admin_categories_delete', ['id' => $category->getId()]);
        $CategoryManager->deleteCategory($category);
        return $this->redirectToRoute('admin_categories');
    }

}