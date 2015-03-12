<?php

namespace Esgi\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Posts
 *
 * @ORM\Table(name="Posts")
 * @ORM\Entity(repositoryClass="Esgi\BlogBundle\Entity\PostsRepository")
 */
class Posts
{
    /**
     * @ORM\ManyToOne(targetEntity="Esgi\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="post_created_at", type="datetime")
     */
    private $postCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="post_update_at", type="datetime")
     */
    private $postUpdatedAt;

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
     * @ORM\Column(name="comments_allowed", type="integer")
     */
    private $commentsAllowed;

    /**
     * @var integer
     *
     * @ORM\Column(name="comments_count", type="integer")
     */
    private $commentsCount;

    /**
     * @var string
     *
     * @ORM\Column(name="post_image", type="string", length=255)
     */
    private $postImage;

    /**
     * @var string
     *
     * @ORM\Column(name="post_slug", type="string", unique=true, length=255)
     */
    private $postSlug;

    /**
     * @ORM\ManyToMany(targetEntity="Esgi\BlogBundle\Entity\Categories", inversedBy="posts", cascade={"persist", "merge"})
     */
    private $category;


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
     * Set postCreatedAt
     *
     * @param \DateTime $postCreatedAt
     * @return Posts
     */
    public function setPostCreatedAt($postCreatedAt)
    {
        $this->postCreatedAt = $postCreatedAt;

        return $this;
    }

    /**
     * Get postCreatedAt
     *
     * @return \DateTime 
     */
    public function getPostCreatedAt()
    {
        return $this->postCreatedAt;
    }

    /**
     * Set postUpdatedAt
     *
     * @param \DateTime $postUpdatedAt
     * @return Posts
     */
    public function setPostUpdatedAt($postUpdatedAt)
    {
        $this->postUpdatedAt = $postUpdatedAt;

        return $this;
    }

    /**
     * Get postUpdatedAt
     *
     * @return \DateTime 
     */
    public function getPostUpdatedAt()
    {
        return $this->postUpdatedAt;
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
}
