<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 09/01/17
 * Time: 15:29
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Player
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="player")
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="email", type="string", length=45, nullable=false)
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
     * @ORM\Column(name="structure", type="string", length=45, nullable=false)
     */
    private $structure;

    /**
     * @var $status
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var $step
     * @ORM\Column(name="step", type="integer", nullable=false)
     */
    private $step;

    /**
     * @var $user
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(name="privatekey", type="string", length=255, nullable=false)
     */
    private $privatekey;

    /**
     * @var $userstructure
     * @ORM\Column(name="userstructure", type="string", length=45, nullable=true)
     */
    private $userstructure;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->userstructure = $user->getStructurename();
        $this->status = 2;
        $this->step = 0;
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
     * Set email
     *
     * @param string $email
     *
     * @return Player
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Player
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
     * @return Player
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
     * Set structure
     *
     * @param string $structure
     *
     * @return Player
     */
    public function setStructure($structure)
    {
        $this->structure = $structure;

        return $this;
    }

    /**
     * Get structure
     *
     * @return string
     */
    public function getStructure()
    {
        return $this->structure;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Player
     */
    public function setStatus( $status)
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
     * Set step
     *
     * @param integer $step
     *
     * @return Player
     */
    public function setStep($step)
    {
        $this->step = $step;

        return $this;
    }

    /**
     * Get step
     *
     * @return integer
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Player
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;
        $this->setUserstructure($user->getStructurename());

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
     * Set privatekey
     *
     * @param string $privatekey
     *
     * @return Player
     */
    public function setPrivatekey($privatekey)
    {
        $this->privatekey = $privatekey;

        return $this;
    }

    /**
     * Get privatekey
     *
     * @return string
     */
    public function getPrivatekey()
    {
        return $this->privatekey;
    }

    /**
     * @return $this
     */
    public function accept()
    {
        $this->setStatus(1);

        return $this;
    }

    /**
     * @return $this
     */
    public function decline()
    {
        $this->setStatus(0);

        return $this;
    }

    /**
     * Set userstructure
     *
     * @param string $userstructure
     *
     * @return Player
     */
    public function setUserstructure($userstructure)
    {
        $this->userstructure = $userstructure;

        return $this;
    }

    /**
     * Get userstructure
     *
     * @return string
     */
    public function getUserstructure()
    {
        return $this->userstructure;
    }
}
