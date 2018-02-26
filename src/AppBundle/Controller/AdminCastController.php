<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cast;
use AppBundle\Form\CastType;
use AppBundle\Form\FilmType;
use AppBundle\Manager\CastManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminCastController extends Controller
{
    /**
     * @Route("/Admin/casts", name="admin_casts")
     * @param  CastManager $CastManager
     */
    public function indexCast(CastManager $CastManager)
   {

       $lesCasts = $CastManager->getCasts();

        $this->generateUrl( 'admin_casts');
        return $this->render('admin/cast/index.html.twig', [
            'casts' => $lesCasts ]);
    }
    /**
     * @Route("/Admin/casts/show/{id}", name="admin_casts_show")
     * @param  CastManager $CastManager
     */
    public function showCast(CastManager $CastManager, $id)
    {
        $Cast = $CastManager->getCast($id);
        $this->generateUrl( 'admin_casts_show', ['id' => $Cast->getId()]);
        return $this->render('admin/cast/show.html.twig', [
            'cast' => $Cast ]);
    }

    /**
     * @Route("/Admin/casts/edit", name="admin_casts_edit")
     */

    public function editCast(Request $request)
    {
        $this->generateUrl( 'admin_casts_edit');
        return $this->render('admin/cast/edit.html.twig', [ ]);
    }

    /**
     * @Route("/Admin/casts/new", name="admin_casts_new")
    */

    public function newCast(Request $request)
    {
        $cast = new Cast();
        $form = $this->createForm(CastType::class, $cast );
        $form->handleRequest( $request );

        if ($form->isSubmitted() && $form->isValid()) {
            $cast = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist( $cast );
            $em->flush();
            return $this->redirectToRoute( 'admin_casts');
        }

        $this->generateUrl( 'admin_casts_new');
        return $this->render('admin/cast/new.html.twig', [
            'form' => $form->createView()
            ]);
    }
    /**
     * @Route("/Admin/casts/delete/{id}", name="admin_casts_delete")
     * @param  CastManager $CastManager
     */
    public function deleteCategory (CastManager $CastManager, $id){
        $cast = $CastManager->getCast($id);
        $this->generateUrl( 'admin_casts_delete',['id' => $cast->getId()]);
        $CastManager->deleteCast($cast);
        return $this->redirectToRoute( 'admin_casts');
    }


}