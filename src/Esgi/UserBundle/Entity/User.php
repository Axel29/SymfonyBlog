<?php

namespace Esgi\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="User")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Esgi\BlogBundle\Entity\Comments", inversedBy="user", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="user_comments")
     */
    private $comments;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Add comments
     *
     * @param \Esgi\BlogBundle\Entity\Comments $comment
     * @return User
     */
    public function addComments(\Esgi\BlogBundle\Entity\Comments $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \Esgi\BlogBundle\Entity\Comments $comment
     */
    public function removeComment(\Esgi\BlogBundle\Entity\Comments $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
