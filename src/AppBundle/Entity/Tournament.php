<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 10/01/17
 * Time: 19:32
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Timestampable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Tournament
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="tournament")
 */
class Tournament
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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Player")
     */
    private $winner;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User")
     */
    private $user;

    /**
     * @var ArrayCollection $matchs
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Match", mappedBy="tournament", cascade={"all"})
     */
    private $matchs;

    /**
     * Tournament constructor.
     */
    public function __construct(User $user)
    {
        $user->setTournament($this);
        $this->user = $user;
        $this->status = 1;
        $this->matchs = new ArrayCollection();
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
     * @return Tournament
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
     * Set winner
     *
     * @param \AppBundle\Entity\Player $winner
     *
     * @return Tournament
     */
    public function setWinner(\AppBundle\Entity\Player $winner = null)
    {
        $this->winner = $winner;

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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Tournament
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add match
     *
     * @param \AppBundle\Entity\Match $match
     *
     * @return Tournament
     */
    public function addMatch(\AppBundle\Entity\Match $match)
    {
        $this->matchs[] = $match;

        return $this;
    }

    /**
     * Remove match
     *
     * @param \AppBundle\Entity\Match $match
     */
    public function removeMatch(\AppBundle\Entity\Match $match)
    {
        $this->matchs->removeElement($match);
    }

    /**
     * Get matchs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMatchs()
    {
        return $this->matchs;
    }
}
