<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cast;
use AppBundle\Form\CastType;
use AppBundle\Manager\CastManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminCastController extends Controller
{
    /**
     * @Route("/admin/casts", name="admin_casts")
     * @param  CastManager $castManager
     */
    public function indexCast(CastManager $castManager)
    {

        $casts = $castManager->getCasts();

        $this->generateUrl('admin_casts');
        return $this->render('admin/cast/index.html.twig', [
            'casts' => $casts]);
    }

    /**
     * @Route("/admin/casts/show/{id}", name="admin_casts_show")
     * @param  CastManager $castManager
     */
    public function showCast(CastManager $castManager, $id)
    {
        $cast = $castManager->getCast($id);
        $this->generateUrl('admin_casts_show', ['id' => $cast->getId()]);
        return $this->render('admin/cast/show.html.twig', [
            'cast' => $cast]);
    }

    /**
     * @Route("/admin/casts/edit/{id}", name="admin_casts_edit", requirements={"cast" = "\d+"})
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editCast(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $cast = $em->getRepository(Cast::class)->find($id);
        $form = $this->createForm(CastType::class, $cast);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cast = $form->getData();
            $em->persist($cast);+
            $em->flush();

            return $this->redirectToRoute('admin_casts');
        }

        $this->generateUrl('admin_casts_edit', [
            'id' => $cast->getId()
        ]);
        return $this->render('admin/cast/edit.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/admin/casts/new", name="admin_casts_new")
     */
    public function newCast(Request $request, CastManager $castManager)
    {
        $cast = new Cast();
        $form = $this->createForm(CastType::class, $cast);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $castManager->addCast($form->getData());
            return $this->redirectToRoute('admin_casts');
        }

        $this->generateUrl('admin_casts_new');
        return $this->render('admin/cast/new.html.twig', ['form' =>
            $form->createView()]);
    }

    /**
     * @Route("/admin/casts/delete/{id}", name="admin_casts_delete")
     * @param  CastManager $castManager
     */
    public function deleteCategory(CastManager $castManager, $id)
    {
        $cast = $castManager->getCast($id);
        $this->generateUrl('admin_casts_delete', ['id' => $cast->getId()]);
        $castManager->deleteCast($cast);
        return $this->redirectToRoute('admin_casts');
    }


}