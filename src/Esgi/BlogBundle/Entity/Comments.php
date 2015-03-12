<?php

namespace Esgi\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

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
     * @ORM\Column(name="comment_post_id", type="integer")
     */
    private $commentPostId;

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
