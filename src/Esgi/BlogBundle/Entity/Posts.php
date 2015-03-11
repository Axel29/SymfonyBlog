<?php

namespace Esgi\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Posts
 *
 * @ORM\Table()
 * @ORM\Entity
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
     * @ORM\Column(name="post_author", type="integer")
     */
    private $postAuthor;

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
    private $postUpdateAt;

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
     * @ORM\Column(name="post_status", type="string", length=20)
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
     * @ORM\Column(name="post_image", type="text")
     */
    private $postImage;

    /**
     * @var string
     *
     * @ORM\Column(name="post_slug", type="string", length=255)
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
php app/console doctrine:generate:entity --entity="EsgiBlogBundle:Categories" --fields="categorySlug:string(255) categoryName:text"
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
