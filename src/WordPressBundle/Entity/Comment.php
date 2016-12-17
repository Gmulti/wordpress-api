<?php

namespace WordPressBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ApiResource(attributes={
        "filters"={
            "comment.search"
        }
    }
)
 * @ORM\Entity
 * @ORM\Table(name="wp_comments")
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", name="comment_ID")
     */
    protected $commentId;

    /**
     *
     * @ORM\Column(type="bigint", name="comment_post_ID")
     */
    protected $commentPostId;

    /**
     *
     * @ORM\Column(type="text", name="comment_author")
     */
    protected $commentAuthor;

    /**
     *
     * @ORM\Column(type="string", name="comment_author_email")
     */
    protected $commentAuthorEmail;

    /**
     *
     * @ORM\Column(type="string", name="comment_author_url")
     */
    protected $commentAuthorUrl;

    /**
     *
     * @ORM\Column(type="string", name="comment_author_IP")
     */
    protected $commentAuthorIP;

    /**
     *
     * @ORM\Column(type="datetime", name="comment_date")
     */
    protected $commentDate;

    /**
     *
     * @ORM\Column(type="datetime", name="comment_date_gmt")
     */
    protected $commentDateGmt;

    /**
     *
     * @ORM\Column(type="text", name="comment_content")
     */
    protected $commentContent;

    /**
     *
     * @ORM\Column(type="integer", name="comment_karma")
     */
    protected $commentKarma;

    /**
     *
     * @ORM\Column(type="string", name="comment_approved")
     */
    protected $commentApproved;

    /**
     *
     * @ORM\Column(type="string", name="comment_agent")
     */
    protected $commentAgent;

    /**
     *
     * @ORM\Column(type="string", name="comment_type")
     */
    protected $commentType;

    /**
     *
     * @ORM\Column(type="bigint", name="comment_parent")
     */
    protected $commentParent;

    /**
     *
     * @ORM\Column(type="bigint", name="user_id")
     */
    protected $userId;


    /**
     * Get commentId
     *
     * @return integer
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * Set commentPostId
     *
     * @param integer $commentPostId
     *
     * @return Comment
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
     * @param string $commentAuthor
     *
     * @return Comment
     */
    public function setCommentAuthor($commentAuthor)
    {
        $this->commentAuthor = $commentAuthor;

        return $this;
    }

    /**
     * Get commentAuthor
     *
     * @return string
     */
    public function getCommentAuthor()
    {
        return $this->commentAuthor;
    }

    /**
     * Set commentAuthorEmail
     *
     * @param string $commentAuthorEmail
     *
     * @return Comment
     */
    public function setCommentAuthorEmail($commentAuthorEmail)
    {
        $this->commentAuthorEmail = $commentAuthorEmail;

        return $this;
    }

    /**
     * Get commentAuthorEmail
     *
     * @return string
     */
    public function getCommentAuthorEmail()
    {
        return $this->commentAuthorEmail;
    }

    /**
     * Set commentAuthorUrl
     *
     * @param string $commentAuthorUrl
     *
     * @return Comment
     */
    public function setCommentAuthorUrl($commentAuthorUrl)
    {
        $this->commentAuthorUrl = $commentAuthorUrl;

        return $this;
    }

    /**
     * Get commentAuthorUrl
     *
     * @return string
     */
    public function getCommentAuthorUrl()
    {
        return $this->commentAuthorUrl;
    }

    /**
     * Set commentAuthorIP
     *
     * @param string $commentAuthorIP
     *
     * @return Comment
     */
    public function setCommentAuthorIP($commentAuthorIP)
    {
        $this->commentAuthorIP = $commentAuthorIP;

        return $this;
    }

    /**
     * Get commentAuthorIP
     *
     * @return string
     */
    public function getCommentAuthorIP()
    {
        return $this->commentAuthorIP;
    }

    /**
     * Set commentDate
     *
     * @param \DateTime $commentDate
     *
     * @return Comment
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;

        return $this;
    }

    /**
     * Get commentDate
     *
     * @return \DateTime
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * Set commentDateGmt
     *
     * @param \DateTime $commentDateGmt
     *
     * @return Comment
     */
    public function setCommentDateGmt($commentDateGmt)
    {
        $this->commentDateGmt = $commentDateGmt;

        return $this;
    }

    /**
     * Get commentDateGmt
     *
     * @return \DateTime
     */
    public function getCommentDateGmt()
    {
        return $this->commentDateGmt;
    }

    /**
     * Set commentContent
     *
     * @param string $commentContent
     *
     * @return Comment
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
     * Set commentKarma
     *
     * @param integer $commentKarma
     *
     * @return Comment
     */
    public function setCommentKarma($commentKarma)
    {
        $this->commentKarma = $commentKarma;

        return $this;
    }

    /**
     * Get commentKarma
     *
     * @return integer
     */
    public function getCommentKarma()
    {
        return $this->commentKarma;
    }

    /**
     * Set commentApproved
     *
     * @param string $commentApproved
     *
     * @return Comment
     */
    public function setCommentApproved($commentApproved)
    {
        $this->commentApproved = $commentApproved;

        return $this;
    }

    /**
     * Get commentApproved
     *
     * @return string
     */
    public function getCommentApproved()
    {
        return $this->commentApproved;
    }

    /**
     * Set commentAgent
     *
     * @param string $commentAgent
     *
     * @return Comment
     */
    public function setCommentAgent($commentAgent)
    {
        $this->commentAgent = $commentAgent;

        return $this;
    }

    /**
     * Get commentAgent
     *
     * @return string
     */
    public function getCommentAgent()
    {
        return $this->commentAgent;
    }

    /**
     * Set commentType
     *
     * @param string $commentType
     *
     * @return Comment
     */
    public function setCommentType($commentType)
    {
        $this->commentType = $commentType;

        return $this;
    }

    /**
     * Get commentType
     *
     * @return string
     */
    public function getCommentType()
    {
        return $this->commentType;
    }

    /**
     * Set commentParent
     *
     * @param integer $commentParent
     *
     * @return Comment
     */
    public function setCommentParent($commentParent)
    {
        $this->commentParent = $commentParent;

        return $this;
    }

    /**
     * Get commentParent
     *
     * @return integer
     */
    public function getCommentParent()
    {
        return $this->commentParent;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Comment
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
