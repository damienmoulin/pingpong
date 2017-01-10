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
use Symfony\Component\HttpFoundation\Response;

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

        if ($form->isValid() && count($user->getPlayers()) < $this->container->getParameter('participants')) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);

            $link = sha1(uniqid(mt_rand(), true));
            $player->setPrivatekey($link);

            $em->flush();
            
            return $this->redirect($this->generateUrl('team'));
        }

        return $this->render('team/index.html.twig', [
            'form' => $form->createView(),
            'user' => $user
        ]);
    }

    /**
     * @param $key
     * @return renderView
     * @Route("/accept/{key}", name="team_accept_player")
     */
    public function acceptPlayerAction($key)
    {
        $player = $this->getDoctrine()->getRepository('AppBundle:Player')->findOneBy(
            [
                'privatekey' => $key
            ]);

        $message = 'Vous avez déja refusé l\'invitation , vous ne pouvez plus accepté de participer';

        if (($player != null) && ($player->getStatus() != 0)) {
            $player->accept();
            $this->flush($player);

            $message = 'Vous avez accepté de participer au tournoi';
        }

        return $this->render('team/confirm_decline.html.twig', [
            'message' => $message
        ]);
    }

    /**
     * @param $key
     * @return renderView
     * @Route("/decline/{key}", name="team_decline_player")
     */
    public function declinePlayerAction($key)
    {
        $player = $this->getDoctrine()->getRepository('AppBundle:Player')->findOneBy(
            [
                'privatekey' => $key
            ]);

        $message = 'Vous avez déja accepter l\'invitation , vous ne pouvez plus refuser de participer';

        if (($player != null) && ($player->getStatus() != 1)) {
            $player->decline();
            $this->flush($player);
            $message = 'Vous avez refusé de participer au tournoi';
        }

        return $this->render('team/confirm_decline.html.twig',[
            'message' => $message
        ]);
    }

    /**
     * @param $entity
     */
    public function flush($entity)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();
    }
}