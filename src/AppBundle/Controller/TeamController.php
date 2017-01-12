<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 09/01/17
 * Time: 15:39
 */

namespace AppBundle\Controller;

use Mailgun\Mailgun;
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

        $acceptedPlayers = $this->getAcceptedPlayersAction($player->getUser());

        $form = $this->get('form.factory')->create('AppBundle\Form\PlayerType', $player);

        $form->handleRequest($request);

        if ($form->isValid() && count($acceptedPlayers) < $this->container->getParameter('participants')) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($player);

            $link = sha1(uniqid(mt_rand(), true));
            $player->setPrivatekey($link);

            $subject = '[PingPong Startup Cup] '.$user->getFirstName().' '.$user->getLastName().' vous invite à rejoindre son équipe !';

            $this->forward('app.sendmail_controller:sendMailAction',
                [
                    'to' => $player->getEmail(),
                    'subject' => $subject,
                    'text' => $this->renderView('email/invitation.html.twig', [ 'user' => $user, 'player' => $player])
                ]);

            $em->flush();

            return $this->redirect($this->generateUrl('team'));
        }

        return $this->render('team/index.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
            'acceptedPlayers' => $acceptedPlayers
        ]);
    }

    /**
     * @param Player $player
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/stop/{player}", name="team_stop_invitation")
     */
    public function stopInvitationAction(Player $player)
    {
        if ($player->getStatus() == 2) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($player);

            $em->flush();

            $subject = '[PingPong Startup Cup] '.$player->getUser()->getFirstName().' '.$player->getUser()->getLastName().' a annulé votre participation au sein de son équipe !';

            $this->forward('app.sendmail_controller:sendMailAction',
                [
                    'to' => $player->getEmail(),
                    'subject' => $subject,
                    'text' => $this->renderView('email/stop.html.twig', [ 'user' => $player->getUser()])
                ]);

        }

        return $this->redirect($this->generateUrl('team'));
    }

    /**
     * @param Player $player
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/invitation/{player}", name="team_re_invitation")
     */
    public function reInvitationAction(Player $player)
    {
        $subject = '[PingPong Startup Cup] L\'invitation de '.$player->getUser()->getFirstName().' '.$player->getUser()->getLastName().' n\'a toujours pas reçu de réponse !';

        $this->forward('app.sendmail_controller:sendMailAction',
            [
                'to' => $player->getEmail(),
                'subject' => $subject,
                'text' => $this->renderView('email/re_invitation.html.twig', [ 'user' => $player->getUser(), 'player' => $player])
            ]);

        return $this->redirect($this->generateUrl('team'));
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

        $acceptedPlayers = $this->getAcceptedPlayersAction($player->getUser());

        $title = 'Dommage';
        $message = 'Vous avez déja refusé l\'invitation , vous ne pouvez plus accepter de participer';

        if (($player != null) && ($player->getStatus() != 0) && ($player->getUser()->getTournament() == null) && ( count($acceptedPlayers) < $this->container->getParameter('participants'))) {
            $player->accept();
            $this->flush($player);

            $title = 'Félicitations';
            $message = 'Vous avez accepté de participer au tournoi';
        }

        return $this->render('team/confirm_decline.html.twig', [
            'message' => $message,
            'title' => $title
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

        $title = 'Dommage';
        $message = 'Vous avez déja accepté l\'invitation , vous ne pouvez plus refuser de participer';

        if (($player != null) && ($player->getStatus() != 1) && ($player->getUser()->getTournament() == null)) {
            $player->decline();
            $this->flush($player);
            $message = 'Vous avez refusé de participer au tournoi';
        }

        return $this->render('team/confirm_decline.html.twig',[
            'title' => $title,
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

    /**
     * @param $user
     * @return \AppBundle\Entity\Player[]|array
     */
    public function getAcceptedPlayersAction($user)
    {
        $acceptedPlayers = $this->getDoctrine()->getRepository('AppBundle:Player')->findBy([
            'user' => $user,
            'status' => 1
        ]);

        return $acceptedPlayers;
    }
}