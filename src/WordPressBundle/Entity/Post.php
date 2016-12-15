<?php

namespace WordPressBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ApiResource(attributes={
        "filters"={
            "post.search"
        },
        "pagination_items_per_page"=1000
    }
)
 * @ORM\Entity
 * @ORM\Table(name="wp_posts")
 */
class Post
{
    /**
     *
     * @ORM\Id
     * @ORM\Column(type="integer", name="ID")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @ORM\Column(type="integer", name="post_author")
     */
    protected $postAuthor;

    /**
     *
     * @ORM\Column(type="datetime", name="post_date")
     */
    protected $postDate;

    /**
     *
     * @ORM\Column(type="datetime", name="post_date_gmt")
     */
    protected $postDateGmt;

    /**
     *
     * @ORM\Column(type="string", name="post_content")
     */
    protected $postContent;

    /**
     *
     * @ORM\Column(type="string", name="post_title")
     */
    protected $postTitle;

    /**
     *
     * @ORM\Column(type="string", name="post_excerpt")
     */
    protected $postExcerpt;

    /**
     *
     * @ORM\Column(type="string", name="post_status")
     */
    protected $postStatus;

    /**
     *
     * @ORM\Column(type="string", name="comment_status")
     */
    protected $commentStatus;

    /**
     *
     * @ORM\Column(type="string", name="ping_status")
     */
    protected $pingStatus;

    /**
     *
     * @ORM\Column(type="string", name="post_password")
     */
    protected $postPassword;

    /**
     *
     * @ORM\Column(type="string", name="post_name")
     */
    protected $postName;

    /**
     *
     * @ORM\Column(type="string", name="to_ping")
     */
    protected $toPing; 

    /**
     *
     * @ORM\Column(type="string", name="pinged")
     */
    protected $pinged;

    /**
     *
     * @ORM\Column(type="datetime", name="post_modified")
     */
    protected $postModified;

    /**
     *
     * @ORM\Column(type="datetime", name="post_modified_gmt")
     */
    protected $postModifiedGmt;

    /**
     *
     * @ORM\Column(type="string", name="post_content_filtered")
     */
    protected $postContentFiltered;

    /**
     *
     * @ORM\Column(type="integer", name="post_parent")
     */
    protected $postParent;

    /**
     *
     * @ORM\Column(type="string", name="guid")
     */
    protected $guid;

    /**
     *
     * @ORM\Column(type="integer", name="menu_order")
     */
    protected $menuOrder;

    /**
     *
     * @ORM\Column(type="string", name="post_type")
     */
    protected $postType;

    /**
     *
     * @ORM\Column(type="string", name="post_mime_type")
     */
    protected $postMimeType;

    /**
     *
     * @ORM\Column(type="integer", name="comment_count")
     */
    protected $commentCount;



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
     * @param integer $postAuthor
     *
     * @return Post
     */
    public function setPostAuthor($postAuthor)
    {
        $this->postAuthor = $postAuthor;

        return $this;
    }

    /**
     * Get postAuthor
     *
     * @return integer
     */
    public function getPostAuthor()
    {
        return $this->postAuthor;
    }

    /**
     * Set postDate
     *
     * @param \DateTime $postDate
     *
     * @return Post
     */
    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;

        return $this;
    }

    /**
     * Get postDate
     *
     * @return \DateTime
     */
    public function getPostDate()
    {
        return $this->postDate;
    }

    /**
     * Set postDateGmt
     *
     * @param \DateTime $postDateGmt
     *
     * @return Post
     */
    public function setPostDateGmt($postDateGmt)
    {
        $this->postDateGmt = $postDateGmt;

        return $this;
    }

    /**
     * Get postDateGmt
     *
     * @return \DateTime
     */
    public function getPostDateGmt()
    {
        return $this->postDateGmt;
    }

    /**
     * Set postContent
     *
     * @param string $postContent
     *
     * @return Post
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
     * Set postTitle
     *
     * @param string $postTitle
     *
     * @return Post
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
     * Set postExcerpt
     *
     * @param string $postExcerpt
     *
     * @return Post
     */
    public function setPostExcerpt($postExcerpt)
    {
        $this->postExcerpt = $postExcerpt;

        return $this;
    }

    /**
     * Get postExcerpt
     *
     * @return string
     */
    public function getPostExcerpt()
    {
        return $this->postExcerpt;
    }

    /**
     * Set postStatus
     *
     * @param string $postStatus
     *
     * @return Post
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
     * Set commentStatus
     *
     * @param string $commentStatus
     *
     * @return Post
     */
    public function setCommentStatus($commentStatus)
    {
        $this->commentStatus = $commentStatus;

        return $this;
    }

    /**
     * Get commentStatus
     *
     * @return string
     */
    public function getCommentStatus()
    {
        return $this->commentStatus;
    }

    /**
     * Set pingStatus
     *
     * @param string $pingStatus
     *
     * @return Post
     */
    public function setPingStatus($pingStatus)
    {
        $this->pingStatus = $pingStatus;

        return $this;
    }

    /**
     * Get pingStatus
     *
     * @return string
     */
    public function getPingStatus()
    {
        return $this->pingStatus;
    }

    /**
     * Set postPassword
     *
     * @param string $postPassword
     *
     * @return Post
     */
    public function setPostPassword($postPassword)
    {
        $this->postPassword = $postPassword;

        return $this;
    }

    /**
     * Get postPassword
     *
     * @return string
     */
    public function getPostPassword()
    {
        return $this->postPassword;
    }

    /**
     * Set postName
     *
     * @param string $postName
     *
     * @return Post
     */
    public function setPostName($postName)
    {
        $this->postName = $postName;

        return $this;
    }

    /**
     * Get postName
     *
     * @return string
     */
    public function getPostName()
    {
        return $this->postName;
    }

    /**
     * Set toPing
     *
     * @param string $toPing
     *
     * @return Post
     */
    public function setToPing($toPing)
    {
        $this->toPing = $toPing;

        return $this;
    }

    /**
     * Get toPing
     *
     * @return string
     */
    public function getToPing()
    {
        return $this->toPing;
    }

    /**
     * Set pinged
     *
     * @param string $pinged
     *
     * @return Post
     */
    public function setPinged($pinged)
    {
        $this->pinged = $pinged;

        return $this;
    }

    /**
     * Get pinged
     *
     * @return string
     */
    public function getPinged()
    {
        return $this->pinged;
    }

    /**
     * Set postModified
     *
     * @param \DateTime $postModified
     *
     * @return Post
     */
    public function setPostModified($postModified)
    {
        $this->postModified = $postModified;

        return $this;
    }

    /**
     * Get postModified
     *
     * @return \DateTime
     */
    public function getPostModified()
    {
        return $this->postModified;
    }

    /**
     * Set postModifiedGmt
     *
     * @param \DateTime $postModifiedGmt
     *
     * @return Post
     */
    public function setPostModifiedGmt($postModifiedGmt)
    {
        $this->postModifiedGmt = $postModifiedGmt;

        return $this;
    }

    /**
     * Get postModifiedGmt
     *
     * @return \DateTime
     */
    public function getPostModifiedGmt()
    {
        return $this->postModifiedGmt;
    }

    /**
     * Set postContentFiltered
     *
     * @param string $postContentFiltered
     *
     * @return Post
     */
    public function setPostContentFiltered($postContentFiltered)
    {
        $this->postContentFiltered = $postContentFiltered;

        return $this;
    }

    /**
     * Get postContentFiltered
     *
     * @return string
     */
    public function getPostContentFiltered()
    {
        return $this->postContentFiltered;
    }

    /**
     * Set postParent
     *
     * @param integer $postParent
     *
     * @return Post
     */
    public function setPostParent($postParent)
    {
        $this->postParent = $postParent;

        return $this;
    }

    /**
     * Get postParent
     *
     * @return integer
     */
    public function getPostParent()
    {
        return $this->postParent;
    }

    /**
     * Set guid
     *
     * @param string $guid
     *
     * @return Post
     */
    public function setGuid($guid)
    {
        $this->guid = $guid;

        return $this;
    }

    /**
     * Get guid
     *
     * @return string
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * Set menuOrder
     *
     * @param integer $menuOrder
     *
     * @return Post
     */
    public function setMenuOrder($menuOrder)
    {
        $this->menuOrder = $menuOrder;

        return $this;
    }

    /**
     * Get menuOrder
     *
     * @return integer
     */
    public function getMenuOrder()
    {
        return $this->menuOrder;
    }

    /**
     * Set postType
     *
     * @param string $postType
     *
     * @return Post
     */
    public function setPostType($postType)
    {
        $this->postType = $postType;

        return $this;
    }

    /**
     * Get postType
     *
     * @return string
     */
    public function getPostType()
    {
        return $this->postType;
    }

    /**
     * Set postMimeType
     *
     * @param string $postMimeType
     *
     * @return Post
     */
    public function setPostMimeType($postMimeType)
    {
        $this->postMimeType = $postMimeType;

        return $this;
    }

    /**
     * Get postMimeType
     *
     * @return string
     */
    public function getPostMimeType()
    {
        return $this->postMimeType;
    }

    /**
     * Set commentCount
     *
     * @param integer $commentCount
     *
     * @return Post
     */
    public function setCommentCount($commentCount)
    {
        $this->commentCount = $commentCount;

        return $this;
    }

    /**
     * Get commentCount
     *
     * @return integer
     */
    public function getCommentCount()
    {
        return $this->commentCount;
    }
}
