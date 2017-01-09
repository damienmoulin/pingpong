<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 09/01/17
 * Time: 15:39
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Player;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/team", name="team")
 */
class TeamController extends Controller
{
    /**
     * @Route("/", name="team")
     */
    public function indexAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $player = new Player($user);

        $form = $this->get('form.factory')->create('AppBundle\Form\PlayerType', $player);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);

            $em->flush();

            $player = new Player($user);
            $form = $this->get('form.factory')->create('AppBundle\Form\PlayerType', $player);
        }
        return $this->render('team/index.html.twig', [
            'form' => $form->createView(),
            'user' => $user
        ]);
    }
}