<?php

namespace WordPressBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ApiResource(attributes={
        "filters"={
            "commentmeta.search"
        }
    }
)
 * @ORM\Entity
 * @ORM\Table(name="wp_commentmeta")
 */
class Commentmeta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", name="meta_id")
     */
    protected $metaId;

    /**
     *
     * @ORM\Column(type="bigint", name="comment_id")
     */
    protected $commentId;

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
     * Set commentId
     *
     * @param integer $commentId
     *
     * @return Commentmeta
     */
    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;

        return $this;
    }

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
     * Set metaKey
     *
     * @param string $metaKey
     *
     * @return Commentmeta
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
     * @return Commentmeta
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
