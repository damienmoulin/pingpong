<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 10/01/17
 * Time: 19:25
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Match;
use AppBundle\Entity\Player;
use AppBundle\Entity\Tournament;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ContestController
 * @package AppBundle\Controller
 * @Route("/contest", name="contest")
 */
class ContestController extends Controller
{
    /**
     * @param User $user
     * @return redirect
     * @Route("/start/{user}", name="contest_start")
     */
    public function startAction(User $user)
    {
        //Penser a supprimer les joueurs qui n'ont pas accepté de jouer de la base de donnée

        if ($user->getTournament() == null) {
            
            $em = $this->getDoctrine()->getManager();

            $tournament = new Tournament($user);
            $em->persist($tournament);

            $players = $user->getPlayers();
            $playersArray = [];

            foreach($players as $player) {
                array_push($playersArray, $player);
            }

            for ($i = 1; $i <= count($players)/2; $i++) {
                $match = new Match();
                $match->setTournament($tournament);
                $match->setRound(1);
                $match->setPlayerone(array_shift($playersArray));
                $match->setPlayertwo(array_shift($playersArray));

                $em->persist($match);
            }

            $em->flush();

            return $this->redirect($this->generateUrl('contest_index', [ 'tournament' => $tournament->getId() ]));
        }
        else {
            return $this->redirect($this->generateUrl('contest_index', [ 'tournament' => $user->getTournament()->getId() ]));
        }
    }

    /**
     * @param Tournament $tournament
     * @return render
     * @Route("/{tournament}", name="contest_index")
     */
    public function indexAction(Tournament $tournament)
    {

        return $this->render(':tournament:index.html.twig', [
            'tournament' => $tournament
        ]);
    }

    /**
     * @param Match $match
     * @param Player $player
     * @return render
     * @Route("/finish/{match}/{player}", name="contest_match_finish")
     */
    public function finishMatchAction(Match $match, Player $player)
    {
        if ($match->getStatus() != 0) {

            $em = $this->getDoctrine()->getManager();

            $match->setWinner($player);
            $em->persist($match);

            if (ceil(sqrt(count($match->getTournament()->getUser()->getPlayers()))) > $match->getRound()) {

                $round = $match->getRound() + 1;

                $findedMatch = $this->getDoctrine()->getRepository('AppBundle:Match')->findOneBy(
                    [
                        'round' => $round,
                        'playertwo' => null
                    ]
                );

                if ($findedMatch == null) {
                    $nextMatch = new Match();
                    $nextMatch->setTournament($match->getTournament());
                    $nextMatch->setPlayerone($player);
                    $nextMatch->setRound($round);
                    $nextMatch->setStatus(2);

                    $em->persist($nextMatch);

                }
                else {
                    $findedMatch->setPlayertwo($player);

                    $em->persist($findedMatch);
                }
            }
            elseif (ceil(sqrt(count($match->getTournament()->getUser()->getPlayers()))) == $match->getRound()) {
                $match->getTournament()->setWinner($player);
                $match->getTournament()->setStatus(0);
                //Tournament Finished
            }

            $em->flush();
        }

        return $this->redirect($this->generateUrl('contest_index', [ 'tournament' => $match->getTournament()->getId() ]));
    }
}