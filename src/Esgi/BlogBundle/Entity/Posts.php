<?php

namespace Esgi\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Posts
 *
 * @ORM\Table()
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
     * @var string
     *
     * @ORM\Column(name="postAuthor", type="integer")
     */
    private $postAuthor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="postCreatedAt", type="datetime")
     */
    private $postCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="postUpdateAt", type="datetime")
     */
    private $postUpdateAt;

    /**
     * @var string
     *
     * @ORM\Column(name="postTitle", type="text")
     */
    private $postTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="postContent", type="text")
     */
    private $postContent;

    /**
     * @var string
     *
     * @ORM\Column(name="postStatus", type="string", length=20)
     */
    private $postStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="commentsAllowed", type="integer")
     */
    private $commentsAllowed;

    /**
     * @var integer
     *
     * @ORM\Column(name="commentsCount", type="integer")
     */
    private $commentsCount;

    /**
     * @var string
     *
     * @ORM\Column(name="postImage", type="text")
     */
    private $postImage;

    /**
     * @var string
     *
     * @ORM\Column(name="postSlug", type="string", unique=true, length=255)
     */
    private $postSlug;


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
     * Set postAuthor
     *
     * @param string $postAuthor
     * @return Posts
     */
    public function setPostAuthor($postAuthor)
    {
        $this->postAuthor = $postAuthor;

        return $this;
    }

    /**
     * Get postAuthor
     *
     * @return string 
     */
    public function getPostAuthor()
    {
        return $this->postAuthor;
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
     * Set postUpdateAt
     *
     * @param \DateTime $postUpdateAt
     * @return Posts
     */
    public function setPostUpdateAt($postUpdateAt)
    {
        $this->postUpdateAt = $postUpdateAt;

        return $this;
    }

    /**
     * Get postUpdateAt
     *
     * @return \DateTime 
     */
    public function getPostUpdateAt()
    {
        return $this->postUpdateAt;
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
}
