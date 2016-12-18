<?php

namespace WordPressBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ApiResource(attributes={
        "filters"={
            "link.search"
        }
    }
)
 * @ORM\Entity
 * @ORM\Table(name="wp_links", indexes={@ORM\Index(name="link_visible", columns={"link_visible"})})
 */
class Link
{
    /**
     * @var string
     *
     * @ORM\Column(name="link_url", type="string", length=255, nullable=false)
     */
    protected $linkUrl = '';

    /**
     * @var string
     *
     * @ORM\Column(name="link_name", type="string", length=255, nullable=false)
     */
    protected $linkName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="link_image", type="string", length=255, nullable=false)
     */
    protected $linkImage = '';

    /**
     * @var string
     *
     * @ORM\Column(name="link_target", type="string", length=25, nullable=false)
     */
    protected $linkTarget = '';

    /**
     * @var string
     *
     * @ORM\Column(name="link_description", type="string", length=255, nullable=false)
     */
    protected $linkDescription = '';

    /**
     * @var string
     *
     * @ORM\Column(name="link_visible", type="string", length=20, nullable=false)
     */
    protected $linkVisible = 'Y';

    /**
     * @var integer
     *
     * @ORM\Column(name="link_owner", type="bigint", nullable=false, options={"unsigned"=true})
     */
    protected $linkOwner = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="link_rating", type="integer", nullable=false)
     */
    protected $linkRating = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="link_updated", type="datetime", nullable=false)
     */
    protected $linkUpdated = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="link_rel", type="string", length=255, nullable=false)
     */
    protected $linkRel = '';

    /**
     * @var string
     *
     * @ORM\Column(name="link_notes", type="text", length=16777215, nullable=false)
     */
    protected $linkNotes;

    /**
     * @var string
     *
     * @ORM\Column(name="link_rss", type="string", length=255, nullable=false)
     */
    protected $linkRss = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="link_id", type="bigint", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $linkId;

    /**
     * Set linkUrl
     *
     * @param string $linkUrl
     *
     * @return Link
     */
    public function setLinkUrl($linkUrl)
    {
        $this->linkUrl = $linkUrl;

        return $this;
    }

    /**
     * Get linkUrl
     *
     * @return string
     */
    public function getLinkUrl()
    {
        return $this->linkUrl;
    }

    /**
     * Set linkName
     *
     * @param string $linkName
     *
     * @return Link
     */
    public function setLinkName($linkName)
    {
        $this->linkName = $linkName;

        return $this;
    }

    /**
     * Get linkName
     *
     * @return string
     */
    public function getLinkName()
    {
        return $this->linkName;
    }

    /**
     * Set linkImage
     *
     * @param string $linkImage
     *
     * @return Link
     */
    public function setLinkImage($linkImage)
    {
        $this->linkImage = $linkImage;

        return $this;
    }

    /**
     * Get linkImage
     *
     * @return string
     */
    public function getLinkImage()
    {
        return $this->linkImage;
    }

    /**
     * Set linkTarget
     *
     * @param string $linkTarget
     *
     * @return Link
     */
    public function setLinkTarget($linkTarget)
    {
        $this->linkTarget = $linkTarget;

        return $this;
    }

    /**
     * Get linkTarget
     *
     * @return string
     */
    public function getLinkTarget()
    {
        return $this->linkTarget;
    }

    /**
     * Set linkDescription
     *
     * @param string $linkDescription
     *
     * @return Link
     */
    public function setLinkDescription($linkDescription)
    {
        $this->linkDescription = $linkDescription;

        return $this;
    }

    /**
     * Get linkDescription
     *
     * @return string
     */
    public function getLinkDescription()
    {
        return $this->linkDescription;
    }

    /**
     * Set linkVisible
     *
     * @param string $linkVisible
     *
     * @return Link
     */
    public function setLinkVisible($linkVisible)
    {
        $this->linkVisible = $linkVisible;

        return $this;
    }

    /**
     * Get linkVisible
     *
     * @return string
     */
    public function getLinkVisible()
    {
        return $this->linkVisible;
    }

    /**
     * Set linkOwner
     *
     * @param integer $linkOwner
     *
     * @return Link
     */
    public function setLinkOwner($linkOwner)
    {
        $this->linkOwner = $linkOwner;

        return $this;
    }

    /**
     * Get linkOwner
     *
     * @return integer
     */
    public function getLinkOwner()
    {
        return $this->linkOwner;
    }

    /**
     * Set linkRating
     *
     * @param integer $linkRating
     *
     * @return Link
     */
    public function setLinkRating($linkRating)
    {
        $this->linkRating = $linkRating;

        return $this;
    }

    /**
     * Get linkRating
     *
     * @return integer
     */
    public function getLinkRating()
    {
        return $this->linkRating;
    }

    /**
     * Set linkUpdated
     *
     * @param \DateTime $linkUpdated
     *
     * @return Link
     */
    public function setLinkUpdated($linkUpdated)
    {
        $this->linkUpdated = $linkUpdated;

        return $this;
    }

    /**
     * Get linkUpdated
     *
     * @return \DateTime
     */
    public function getLinkUpdated()
    {
        return $this->linkUpdated;
    }

    /**
     * Set linkRel
     *
     * @param string $linkRel
     *
     * @return Link
     */
    public function setLinkRel($linkRel)
    {
        $this->linkRel = $linkRel;

        return $this;
    }

    /**
     * Get linkRel
     *
     * @return string
     */
    public function getLinkRel()
    {
        return $this->linkRel;
    }

    /**
     * Set linkNotes
     *
     * @param string $linkNotes
     *
     * @return Link
     */
    public function setLinkNotes($linkNotes)
    {
        $this->linkNotes = $linkNotes;

        return $this;
    }

    /**
     * Get linkNotes
     *
     * @return string
     */
    public function getLinkNotes()
    {
        return $this->linkNotes;
    }

    /**
     * Set linkRss
     *
     * @param string $linkRss
     *
     * @return Link
     */
    public function setLinkRss($linkRss)
    {
        $this->linkRss = $linkRss;

        return $this;
    }

    /**
     * Get linkRss
     *
     * @return string
     */
    public function getLinkRss()
    {
        return $this->linkRss;
    }

    /**
     * Get linkId
     *
     * @return integer
     */
    public function getLinkId()
    {
        return $this->linkId;
    }
}
