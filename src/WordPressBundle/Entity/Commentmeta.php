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
 * @ORM\Table(name="wp_commentmeta", indexes={@ORM\Index(name="comment_id", columns={"comment_id"}), @ORM\Index(name="meta_key", columns={"meta_key"})})
 */
class Commentmeta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="comment_id", type="bigint", nullable=false, options={"unsigned"=true})
     */
    protected $commentId = '0';

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
     * @var integer
     *
     * @ORM\Column(name="meta_id", type="bigint", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $metaId;


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
