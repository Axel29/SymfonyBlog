<?php

namespace Esgi\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table()
 * @ORM\Entity
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
     * @ORM\Column(name="commentPostId", type="integer")
     */
    private $commentPostId;

    /**
     * @var integer
     *
     * @ORM\Column(name="commentAuthor", type="integer")
     */
    private $commentAuthor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="commentCreatedAt", type="datetime")
     */
    private $commentCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="commentUpdatedAt", type="datetime")
     */
    private $commentUpdatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="commentTitle", type="text")
     */
    private $commentTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="commentContent", type="text")
     */
    private $commentContent;

    /**
     * @var integer
     *
     * @ORM\Column(name="commentApprouved", type="smallint")
     */
    private $commentApprouved;


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
     * Set commentPostId
     *
     * @param integer $commentPostId
     * @return Comments
     */
    public function setCommentPostId($commentPostId)
    {
        $this->commentPostId = $commentPostId;

        return $this;
    }

    /**
     * Get commentPostId
     *
     * @return integer 
     */
    public function getCommentPostId()
    {
        return $this->commentPostId;
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
     * Set commentCreatedAt
     *
     * @param \DateTime $commentCreatedAt
     * @return Comments
     */
    public function setCommentCreatedAt($commentCreatedAt)
    {
        $this->commentCreatedAt = $commentCreatedAt;

        return $this;
    }

    /**
     * Get commentCreatedAt
     *
     * @return \DateTime 
     */
    public function getCommentCreatedAt()
    {
        return $this->commentCreatedAt;
    }

    /**
     * Set commentUpdatedAt
     *
     * @param \DateTime $commentUpdatedAt
     * @return Comments
     */
    public function setCommentUpdatedAt($commentUpdatedAt)
    {
        $this->commentUpdatedAt = $commentUpdatedAt;

        return $this;
    }

    /**
     * Get commentUpdatedAt
     *
     * @return \DateTime 
     */
    public function getCommentUpdatedAt()
    {
        return $this->commentUpdatedAt;
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
}
