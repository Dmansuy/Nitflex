<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Studio;
use AppBundle\Form\StudioType;
use AppBundle\Manager\StudioManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminStudioController extends Controller
{
    /**
     * @Route("/admin/studios", name="admin_studios")
     * @param  StudioManager $StudioManager
     */
    public function indexStudio(StudioManager $StudioManager)
    {
        $studios = $StudioManager->getStudios();
        $this->generateUrl('admin_studios');
        return $this->render('admin/studio/index.html.twig', [
            'studios' => $studios
        ]);
    }

    /**
     * @Route("/admin/studios/show/{id}", name="admin_studios_show")
     * @param  StudioManager $StudioManager
     */
    public function showStudio(StudioManager $StudioManager, $id)
    {
        $studio = $StudioManager->getStudio($id);
        $this->generateUrl('admin_studios_show', ['id' => $studio->getId()]);
        return $this->render('admin/studio/show.html.twig', [
            'studio' => $studio
        ]);
    }

    /**
     * @Route("/admin/studios/edit/{id}", name="admin_studios_edit", requirements={"studio" = "\d+"})
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editStudio(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $studio = $em->getRepository(Studio::class)->find($id);
        $form = $this->createForm(StudioType::class, $studio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $studio = $form->getData();
            $em->persist($studio);
            $em->flush();

            return $this->redirectToRoute('admin_studios');
        }

        $this->generateUrl('admin_studios_edit', [
            'id' => $studio->getId()
        ]);
        return $this->render('admin/studio/edit.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/admin/studios/new", name="admin_studios_new")
     */
    public function newStudio(Request $request, StudioManager $studioManager)
    {
        $studio = new Studio();
        $form = $this->createForm(StudioType::class, $studio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $studioManager->addStudio($form->getData());
            return $this->redirectToRoute('admin_studios');
        }
        $this->generateUrl('admin_studios_new');
        return $this->render('admin/studios/new.html.twig', ['form' =>
            $form->createView()]);
    }

    /**
     * @Route("/admin/studios/delete/{id}", name="admin_studios_delete")
     * @param  StudioManager $StudioManager
     */
    public function deleteCategory(StudioManager $StudioManager, $id)
    {
        $studio = $StudioManager->getStudio($id);
        $this->generateUrl('admin_studios_delete', ['id' => $studio->getId()]);
        $StudioManager->deleteStudio($studio);
        return $this->redirectToRoute('admin_studios');
    }

}