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

class UserController extends Controller
{

    /**
     * @Route("/users/signUp", name="users_sign_up")
     */
    public function signUpAction(){
        /*return $this->render('films/signUp.html.twig', [
                    'user' => $user
                ]);*/
    }
    /**
     * @Route("/users/parameter", name="users_param")
     */
    public function showParamUserAction()
    {
        /*return $this->render('user/parameter.html.twig', [
            'user' => $user
        ]);*/
    }

    /**
     * @Route("/users/preferences", name="users_preferences")
     */
    public function showPreferenceUserAction()
    {
        /*return $this->render('films/preferences.html.twig', [
            'user' => $user
        ]);*/
    }
}