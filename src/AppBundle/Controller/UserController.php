<?php
/**
 * Created by IntelliJ IDEA.
 * User: dmansuy
 * Date: 23/02/2018
 * Time: 15:42
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Tests\Controller;

class UserController extends Controller
{
    /**
     * @Route("/users", name="users_param")
     */
    public function showParamUserAction()
    {
        /*return $this->render('user/parameter.html.twig', [
            'film' => $user
        ]);*/
    }

    /**
     * @Route("/users", name="user_preferences")
     */
    public function showPreferenceUserAction()
    {
        /*return $this->render('films/preferences.html.twig', [
            'film' => $user
        ]);*/
    }
}