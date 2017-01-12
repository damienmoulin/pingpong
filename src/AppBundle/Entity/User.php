<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 09/01/17
 * Time: 13:19
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class User
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     */
    protected $email;

    /**
     * @ORM\Column(name="firstname", type="string", length=45, nullable=false)
     */
    private $firstname;

    /**
     * @ORM\Column(name="lastname", type="string", length=45, nullable=false)
     */
    private $lastname;

    /**
     * @ORM\Column(name="structurename", type="string", length=45, nullable=false)
     */
    private $structurename;

    /**
     * @ORM\Column(name="structuretype", type="string", length=45, nullable=false)
     */
    private $structuretype;

    /**
     * @ORM\Column(name="teamname", type="string", length=45, nullable=false)
     */
    private $teamname;

    /**
     * @ORM\Column(name="phonenumber", type="string", length=10, nullable=true)
     */
    private $phonenumber;

    /**
     * @var ArrayCollection $players
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Player", mappedBy="user", cascade={"all"})
     */
    private $players;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Tournament", cascade={"persist"})
     */
    private $tournament;

    /**
     * User Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->players = new ArrayCollection();
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set structurename
     *
     * @param string $structurename
     *
     * @return User
     */
    public function setStructurename($structurename)
    {
        $this->structurename = $structurename;

        return $this;
    }

    /**
     * Get structurename
     *
     * @return string
     */
    public function getStructurename()
    {
        return $this->structurename;
    }

    /**
     * Set structuretype
     *
     * @param string $structuretype
     *
     * @return User
     */
    public function setStructuretype($structuretype)
    {
        $this->structuretype = $structuretype;

        return $this;
    }

    /**
     * Get structuretype
     *
     * @return string
     */
    public function getStructuretype()
    {
        return $this->structuretype;
    }

    /**
     * Set teamname
     *
     * @param string $teamname
     *
     * @return User
     */
    public function setTeamname($teamname)
    {
        $this->teamname = $teamname;

        return $this;
    }

    /**
     * Get teamname
     *
     * @return string
     */
    public function getTeamname()
    {
        return $this->teamname;
    }

    /**
     * Set phonenumber
     *
     * @param string $phonenumber
     *
     * @return User
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return string
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    public function setEmail($email)
    {
        $this->setUsername($email);
        $this->setUsernameCanonical($email);

        return parent::setEmail($email); // TODO: Change the autogenerated stub
    }

    /**
     * Add player
     *
     * @param \AppBundle\Entity\Player $player
     *
     * @return User
     */
    public function addPlayer(Player $player)
    {
        $this->players[] = $player;

        return $this;
    }

    /**
     * Remove player
     *
     * @param \AppBundle\Entity\Player $player
     */
    public function removePlayer(Player $player)
    {
        $this->players->removeElement($player);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Set tournament
     *
     * @param \AppBundle\Entity\Tournament $tournament
     *
     * @return User
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
