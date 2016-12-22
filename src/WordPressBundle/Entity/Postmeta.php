<?php

namespace WordPressBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ApiResource(attributes={
        "filters"={
            "postmeta.search"
        }
    }
)
 * @ORM\Entity
 * @ORM\Table(name="wp_postmeta", indexes={@ORM\Index(name="post_id", columns={"post_id"}), @ORM\Index(name="meta_key", columns={"meta_key"})})
 */
class Postmeta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="meta_id", type="bigint", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $metaId;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="post_id", type="bigint", nullable=false, options={"unsigned"=true})
     */
    protected $postId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="meta_key", type="string", length=255, nullable=true)
     */
    protected $metaKey;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_value", type="text", nullable=true)
     */
    protected $metaValue;


    /**
     * Set postId
     *
     * @param integer $postId
     *
     * @return Postmeta
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;

        return $this;
    }

    /**
     * Get postId
     *
     * @return integer
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * Set metaKey
     *
     * @param string $metaKey
     *
     * @return Postmeta
     */
    public function setMetaKey($metaKey)
    {
        $this->metaKey = $metaKey;

        return $this;
    }

    /**
     * Get metaKey
     *
     * @return string
     */
    public function getMetaKey()
    {
        return $this->metaKey;
    }

    /**
     * Set metaValue
     *
     * @param string $metaValue
     *
     * @return Postmeta
     */
    public function setMetaValue($metaValue)
    {
        $this->metaValue = $metaValue;

        return $this;
    }

    /**
     * Get metaValue
     *
     * @return string
     */
    public function getMetaValue()
    {
        return $this->metaValue;
    }

    /**
     * Get metaId
     *
     * @return integer
     */
    public function getMetaId()
    {
        return $this->metaId;
    }
}
