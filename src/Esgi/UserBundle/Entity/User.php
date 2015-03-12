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
     */
    private $comment;


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
     * Add comment
     *
     * @param \Esgi\BlogBundle\Entity\Comments $comment
     * @return User
     */
    public function addComment(\Esgi\BlogBundle\Entity\Comments $comment)
    {
        $this->comment[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \Esgi\BlogBundle\Entity\Comments $comment
     */
    public function removeComment(\Esgi\BlogBundle\Entity\Comments $comment)
    {
        $this->comment->removeElement($comment);
    }

    /**
     * Get comment
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComment()
    {
        return $this->comment;
    }
}
