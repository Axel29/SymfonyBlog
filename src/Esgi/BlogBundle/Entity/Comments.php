<?php

namespace Esgi\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Comments.
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Esgi\BlogBundle\Entity\CommentsRepository")
 */
class Comments
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(name="updated", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated;

    /**
     * @var string
     *
     * @ORM\Column(name="comment_title", type="text")
     */
    private $commentTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="comment_content", type="text")
     */
    private $commentContent;

    /**
     * @var integer
     *
     * @ORM\Column(name="comment_approuved", type="smallint")
     */
    private $commentApprouved;

    /**
     * @ORM\ManyToOne(targetEntity="Esgi\BlogBundle\Entity\Posts", inversedBy="comments", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="comments_posts")
     */
    private $post;

    /**
     * @ORM\ManyToMany(targetEntity="Esgi\UserBundle\Entity\User", mappedBy="comments")
     **/
    private $user;


    /**
     * Get id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set commentTitle.
     *
     * @param string $commentTitle
     *
     * @return Comments
     */
    public function setCommentTitle($commentTitle)
    {
        $this->commentTitle = $commentTitle;

        return $this;
    }

    /**
     * Get commentTitle.
     *
     * @return string
     */
    public function getCommentTitle()
    {
        return $this->commentTitle;
    }

    /**
     * Set commentContent.
     *
     * @param string $commentContent
     *
     * @return Comments
     */
    public function setCommentContent($commentContent)
    {
        $this->commentContent = $commentContent;

        return $this;
    }

    /**
     * Get commentContent.
     *
     * @return string
     */
    public function getCommentContent()
    {
        return $this->commentContent;
    }

    /**
     * Set commentApprouved.
     *
     * @param integer $commentApprouved
     *
     * @return Comments
     */
    public function setCommentApprouved($commentApprouved)
    {
        $this->commentApprouved = $commentApprouved;

        return $this;
    }

    /**
     * Get commentApprouved.
     *
     * @return integer
     */
    public function getCommentApprouved()
    {
        return $this->commentApprouved;
    }

    /**
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return Comments
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created.
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated.
     *
     * @param \DateTime $updated
     *
     * @return Comments
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated.
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add user.
     *
     * @param \Esgi\UserBundle\Entity\User $user
     *
     * @return Comments
     */
    public function addUser(\Esgi\UserBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user.
     *
     * @param \Esgi\UserBundle\Entity\User $user
     */
    public function removeUser(\Esgi\UserBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set post
     *
     * @param \Esgi\BlogBundle\Entity\Posts $post
     * @return Comments
     */
    public function setPost(\Esgi\BlogBundle\Entity\Posts $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \Esgi\BlogBundle\Entity\Posts 
     */
    public function getPost()
    {
        return $this->post;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
