<?php

namespace Esgi\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Comments
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
     * @var integer
     *
     * @ORM\Column(name="comment_author", type="integer")
     */
    private $commentAuthor;

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
     * @ORM\ManyToMany(targetEntity="Esgi\BlogBundle\Entity\Posts", inversedBy="comments", cascade={"persist", "merge"})
     * * @ORM\JoinTable(name="comments_posts")
     */
    private $post;

    /**
     * @ORM\ManyToMany(targetEntity="Esgi\UserBundle\Entity\User", mappedBy="comments")
     **/
    private $user;


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
     * Set commentAuthor
     *
     * @param integer $commentAuthor
     * @return Comments
     */
    public function setCommentAuthor($commentAuthor)
    {
        $this->commentAuthor = $commentAuthor;

        return $this;
    }

    /**
     * Get commentAuthor
     *
     * @return integer 
     */
    public function getCommentAuthor()
    {
        return $this->commentAuthor;
    }

    /**
     * Set commentTitle
     *
     * @param string $commentTitle
     * @return Comments
     */
    public function setCommentTitle($commentTitle)
    {
        $this->commentTitle = $commentTitle;

        return $this;
    }

    /**
     * Get commentTitle
     *
     * @return string 
     */
    public function getCommentTitle()
    {
        return $this->commentTitle;
    }

    /**
     * Set commentContent
     *
     * @param string $commentContent
     * @return Comments
     */
    public function setCommentContent($commentContent)
    {
        $this->commentContent = $commentContent;

        return $this;
    }

    /**
     * Get commentContent
     *
     * @return string 
     */
    public function getCommentContent()
    {
        return $this->commentContent;
    }

    /**
     * Set commentApprouved
     *
     * @param integer $commentApprouved
     * @return Comments
     */
    public function setCommentApprouved($commentApprouved)
    {
        $this->commentApprouved = $commentApprouved;

        return $this;
    }

    /**
     * Get commentApprouved
     *
     * @return integer 
     */
    public function getCommentApprouved()
    {
        return $this->commentApprouved;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->post = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Comments
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Comments
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add post
     *
     * @param \Esgi\BlogBundle\Entity\Posts $post
     * @return Comments
     */
    public function addPost(\Esgi\BlogBundle\Entity\Posts $post)
    {
        $this->post[] = $post;

        return $this;
    }

    /**
     * Remove post
     *
     * @param \Esgi\BlogBundle\Entity\Posts $post
     */
    public function removePost(\Esgi\BlogBundle\Entity\Posts $post)
    {
        $this->post->removeElement($post);
    }

    /**
     * Get post
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Add user
     *
     * @param \Esgi\UserBundle\Entity\User $user
     * @return Comments
     */
    public function addUser(\Esgi\UserBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Esgi\UserBundle\Entity\User $user
     */
    public function removeUser(\Esgi\UserBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }
}
