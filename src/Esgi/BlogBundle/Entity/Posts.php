<?php

namespace Esgi\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Posts
 *
 * @ORM\Table(name="Posts")
 * @ORM\Entity(repositoryClass="Esgi\BlogBundle\Entity\PostsRepository")
 */
class Posts
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
     * @ORM\Column(name="post_title", type="text")
     */
    private $postTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="post_content", type="text")
     */
    private $postContent;

    /**
     * @var string
     *
     * @ORM\Column(name="post_status", type="string", length=255)
     */
    private $postStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="comments_allowed", type="integer", options={"default":0}, nullable=true)
     */
    private $commentsAllowed;

    /**
     * @var integer
     *
     * @ORM\Column(name="comments_count", type="integer", options={"default":0}, nullable=true)
     */
    private $commentsCount;

    /**
     * @var string
     *
     * @ORM\Column(name="post_image", type="string", length=255, nullable=true)
     */
    private $postImage;

    /**
     * @var string
     *
     * @ORM\Column(name="post_slug", type="string", unique=true, length=255)
     */
    private $postSlug;

    /**
     * @ORM\ManyToOne(targetEntity="Esgi\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="Esgi\BlogBundle\Entity\Categories", inversedBy="posts", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="posts_categories")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="Esgi\BlogBundle\Entity\Comments", mappedBy="post")
     **/
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

    /**
     * Set postTitle
     *
     * @param string $postTitle
     * @return Posts
     */
    public function setPostTitle($postTitle)
    {
        $this->postTitle = $postTitle;

        return $this;
    }

    /**
     * Get postTitle
     *
     * @return string 
     */
    public function getPostTitle()
    {
        return $this->postTitle;
    }

    /**
     * Set postContent
     *
     * @param string $postContent
     * @return Posts
     */
    public function setPostContent($postContent)
    {
        $this->postContent = $postContent;

        return $this;
    }

    /**
     * Get postContent
     *
     * @return string 
     */
    public function getPostContent()
    {
        return $this->postContent;
    }

    /**
     * Set postStatus
     *
     * @param string $postStatus
     * @return Posts
     */
    public function setPostStatus($postStatus)
    {
        $this->postStatus = $postStatus;

        return $this;
    }

    /**
     * Get postStatus
     *
     * @return string
     */
    public function getPostStatus()
    {
        return $this->postStatus;
    }

    /**
     * Set commentsAllowed
     *
     * @param integer $commentsAllowed
     * @return Posts
     */
    public function setCommentsAllowed($commentsAllowed)
    {
        $this->commentsAllowed = $commentsAllowed;

        return $this;
    }

    /**
     * Get commentsAllowed
     *
     * @return integer 
     */
    public function getCommentsAllowed()
    {
        return $this->commentsAllowed;
    }

    /**
     * Set commentsCount
     *
     * @param integer $commentsCount
     * @return Posts
     */
    public function setCommentsCount($commentsCount)
    {
        $this->commentsCount = $commentsCount;

        return $this;
    }

    /**
     * Get commentsCount
     *
     * @return integer 
     */
    public function getCommentsCount()
    {
        return $this->commentsCount;
    }

    /**
     * Set postImage
     *
     * @param string $postImage
     * @return Posts
     */
    public function setPostImage($postImage)
    {
        $this->postImage = $postImage;

        return $this;
    }

    /**
     * Get postImage
     *
     * @return string 
     */
    public function getPostImage()
    {
        return $this->postImage;
    }

    /**
     * Set postSlug
     *
     * @param string $postSlug
     * @return Posts
     */
    public function setPostSlug($postSlug)
    {
        $this->postSlug = $postSlug;

        return $this;
    }

    /**
     * Get postSlug
     *
     * @return string 
     */
    public function getPostSlug()
    {
        return $this->postSlug;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add category
     *
     * @param \Esgi\BlogBundle\Entity\Categories $category
     * @return Posts
     */
    public function addCategory(\Esgi\BlogBundle\Entity\Categories $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \Esgi\BlogBundle\Entity\Categories $category
     */
    public function removeCategory(\Esgi\BlogBundle\Entity\Categories $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set user
     *
     * @param \Esgi\UserBundle\Entity\User $user
     * @return Posts
     */
    public function setUser(\Esgi\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Esgi\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Posts
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
     * @return Posts
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
     * Add comments
     *
     * @param \Esgi\BlogBundle\Entity\Comments $comments
     * @return Posts
     */
    public function addComment(\Esgi\BlogBundle\Entity\Comments $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Esgi\BlogBundle\Entity\Comments $comments
     */
    public function removeComment(\Esgi\BlogBundle\Entity\Comments $comments)
    {
        $this->comments->removeElement($comments);
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
