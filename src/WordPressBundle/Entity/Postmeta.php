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
 * @ORM\Table(name="wp_postmeta")
 */
class Postmeta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", name="meta_id")
     */
    protected $metaId;

    /**
     *
     * @ORM\Column(type="bigint", name="post_id")
     */
    protected $postId;

    /**
     *
     * @ORM\Column(type="string", name="meta_key")
     */
    protected $metaKey;

    /**
     *
     * @ORM\Column(type="text", name="meta_value")
     */
    protected $metaValue;



    /**
     * Get metaId
     *
     * @return integer
     */
    public function getMetaId()
    {
        return $this->metaId;
    }

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
}
