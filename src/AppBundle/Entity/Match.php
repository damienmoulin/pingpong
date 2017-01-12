<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 10/01/17
 * Time: 19:39
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Timestampable;

/**
 * Class Match
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MatchRepository")
 * @ORM\Table(name="game")
 */
class Match
{
    use \Gedmo\Timestampable\Traits\Timestampable;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var $status
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Player")
     * @ORM\JoinColumn(nullable=true)
     */
    private $winner;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Player")
     * @ORM\JoinColumn(nullable=true)
     */
    private $playerone;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Player")
     * @ORM\JoinColumn(nullable=true)
     */
    private $playertwo;

    /**
     * @var $round
     * @ORM\Column(name="round", type="integer", nullable=false)
     */
    private $round;

    /**
     * @var $tournament
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tournament", inversedBy="matchs")
     * @ORM\JoinColumn(name="tournament_id", referencedColumnName="id")
     */
    private $tournament;

    /**
     * Match constructor.
     */
    public function __construct()
    {
        $this->status = 1;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Match
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set round
     *
     * @param integer $round
     *
     * @return Match
     */
    public function setRound($round)
    {
        $this->round = $round;

        return $this;
    }

    /**
     * Get round
     *
     * @return integer
     */
    public function getRound()
    {
        return $this->round;
    }

    /**
     * Set winner
     *
     * @param \AppBundle\Entity\Player $winner
     *
     * @return Match
     */
    public function setWinner(\AppBundle\Entity\Player $winner = null)
    {
        $this->winner = $winner;
        $this->setStatus(0);

        return $this;
    }

    /**
     * Get winner
     *
     * @return \AppBundle\Entity\Player
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * Set playerone
     *
     * @param \AppBundle\Entity\Player $playerone
     *
     * @return Match
     */
    public function setPlayerone(\AppBundle\Entity\Player $playerone)
    {
        $this->playerone = $playerone;

        return $this;
    }

    /**
     * Get playerone
     *
     * @return \AppBundle\Entity\Player
     */
    public function getPlayerone()
    {
        return $this->playerone;
    }

    /**
     * Set playertwo
     *
     * @param \AppBundle\Entity\Player $playertwo
     *
     * @return Match
     */
    public function setPlayertwo(\AppBundle\Entity\Player $playertwo)
    {
        $this->playertwo = $playertwo;

        return $this;
    }

    /**
     * Get playertwo
     *
     * @return \AppBundle\Entity\Player
     */
    public function getPlayertwo()
    {
        return $this->playertwo;
    }

    /**
     * Set tournament
     *
     * @param \AppBundle\Entity\Tournament $tournament
     *
     * @return Match
     */
    public function setTournament(\AppBundle\Entity\Tournament $tournament = null)
    {
        $this->tournament = $tournament;

        return $this;
    }

    /**
     * Get tournament
     *
     * @return \AppBundle\Entity\Tournament
     */
    public function getTournament()
    {
        return $this->tournament;
    }
}
