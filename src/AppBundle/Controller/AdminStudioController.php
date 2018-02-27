<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Studio;
use AppBundle\Form\StudioType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Manager\StudioManager;
use AppBundle\Entity\Category;
class AdminStudioController extends Controller
{
    /**
     * @Route("/Admin/studios", name="admin_studios")
     * @param  StudioManager $StudioManager
     */
    public function indexStudio(StudioManager $StudioManager)
    {
        $lesStudios = $StudioManager->getStudios();
        $this->generateUrl( 'admin_studios');
        return $this->render('admin/studio/index.html.twig', [
            'studios' => $lesStudios ]);
    }
    /**
     * @Route("/Admin/studios/show/{id}", name="admin_studios_show")
     * @param  StudioManager $StudioManager
     */
    public function showStudio(StudioManager $StudioManager,$id)
    {
        $studio = $StudioManager->getStudio($id);
        $this->generateUrl( 'admin_studios_show',['id' => $studio->getId()]);
        return $this->render('admin/studio/show.html.twig', [ ]);
    }

    /**
     * @Route("/Admin/studios/edit", name="admin_studios_edit")
     */

    public function editStudio(Request $request)
    {
        $this->generateUrl( 'admin_studios_edit');
        return $this->render('admin/studio/edit.html.twig', [ ]);
    }

    /**
     * @Route("/Admin/studios/new", name="admin_studios_new")
     */

    public function newStudio(Request $request)
    {
        $studio = new Studio();
        $form = $this->createForm(StudioType::class, $studio );
        $form->handleRequest( $request );

        if ($form->isSubmitted() && $form->isValid()) {
            $studio = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist( $studio );
            $em->flush();
            return $this->redirectToRoute( 'admin_studios');
        }
        $this->generateUrl( 'admin_studios_new');
        return $this->render('admin/studio/new.html.twig', [
            'form' => $form->createView() ]);
    }

    /**
     * @Route("/Admin/studios/delete/{id}", name="admin_studios_delete")
     * @param  StudioManager $StudioManager
     */
    public function deleteCategory (StudioManager $StudioManager, $id){
        $studio = $StudioManager->getStudio($id);
        $this->generateUrl( 'admin_studios_delete',['id' => $studio->getId()]);
        $StudioManager->deleteStudio($studio);
        return $this->redirectToRoute( 'admin_studios');
    }

}