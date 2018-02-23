<?php
/**
 * Created by IntelliJ IDEA.
 * User: dmansuy
 * Date: 23/02/2018
 * Time: 14:23
 */

namespace AppBundle\Controller;


use Symfony\Component\HttpKernel\Tests\Controller;

class FilmController extends Controller
{
    /**
     * @Route("/projects/{id}", name="project_view", requirements={"id"="\d+"})
     */
    public function listMoviesByCatAction(int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository(Project:: class)
            ->find($id);
        return $this->render( 'project/view.html.twig', [
            'project' => $project
        ]);
    }
}