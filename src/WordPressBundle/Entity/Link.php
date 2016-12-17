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
 * @ORM\Table(name="wp_links")
 */
class Link
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", name="link_id")
     */
    protected $linkId;

    /**
     *
     * @ORM\Column(type="string", name="link_url")
     */
    protected $linkUrl;

    /**
     *
     * @ORM\Column(type="string", name="link_name")
     */
    protected $linkName;

    /**
     *
     * @ORM\Column(type="string", name="link_image")
     */
    protected $linkImage;

    /**
     *
     * @ORM\Column(type="string", name="link_target")
     */
    protected $linkTarget;

    /**
     *
     * @ORM\Column(type="string", name="link_description")
     */
    protected $linkDescription;



    /**
     * Get linkId
     *
     * @return integer
     */
    public function getLinkId()
    {
        return $this->linkId;
    }

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
}
