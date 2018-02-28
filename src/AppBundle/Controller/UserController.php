<?php
/**
 * Created by IntelliJ IDEA.
 * User: dmansuy
 * Date: 23/02/2018
 * Time: 15:42
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Manager\UserManager;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{

    /**
     * @Route("/users/sign-up", name="sign_up")
     * @param UserManager $userManager
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function signUpAction(UserManager $userManager, Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if (!$form) {
            $this->errorAction($user);
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $userManager->createUser($form->getData());
            return $this->redirectToRoute('films_list');
        }
        return $this->render('users/sign-up.html.twig', [
                    'form' => $form->createView()
                ]);
    }

    /**
     * @param $user
     * @return void
     */
    private function errorAction($user)
    {
        throw new NotFoundHttpException('404, Article not found.');
    }
}