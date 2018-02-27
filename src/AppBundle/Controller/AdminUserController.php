<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Manager\UserManager;

class AdminUserController extends Controller
{
    /**
     * @Route("/admin/users", name="admin_users")
     * @param  UserManager $UserManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexUser(UserManager $UserManager)
    {
        $lesUsers = $UserManager->getLesUsers();
        $this->generateUrl( 'admin_users');
        return $this->render('admin/user/index.html.twig', [
            'users' => $lesUsers ]);
    }
    /**
     * @Route("/admin/users/show/{id}", name="admin_users_show")
     * @param UserManager $UserManager
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showUser(UserManager $UserManager,$id)
    {
        $user = $UserManager->getUnUser($id);
        $this->generateUrl( 'admin_users_show',['id' => $user->getId()]);
        return $this->render('admin/user/show.html.twig', [ ]);
    }

    /**
     * @Route("/admin/users/edit", name="admin_users_edit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editUser(Request $request)
    {
        $this->generateUrl( 'admin_users_edit');
        return $this->render('admin/user/edit.html.twig', [ ]);
    }

    /**
     * @Route("/admin/users/new", name="admin_users_new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newUser(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user );
        $form->handleRequest( $request );

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist( $category );
            $em->flush();
            return $this->redirectToRoute( 'admin_users');
        }
        $this->generateUrl( 'admin_users_new');
        return $this->render('admin/user/new.html.twig', [
            'form' => $form->createView() ]);
    }

    /**
     * @Route("/admin/users/delete/{id}", name="admin_users_delete")
     * @param UserManager $UserManager
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteUser (UserManager $UserManager, $id){
        $user = $UserManager->getUnUser($id);
        $this->generateUrl( 'admin_users_delete',['id' => $user->getId()]);
        $UserManager->deleteUser($user);
        return $this->redirectToRoute( 'admin_users');
    }

}