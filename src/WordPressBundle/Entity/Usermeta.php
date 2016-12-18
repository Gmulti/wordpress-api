<?php

namespace WordPressBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ApiResource(attributes={
        "filters"={
            "usermeta.search"
        }
    }
)
 * @ORM\Entity
 * @ORM\Table(name="wp_usermeta", indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="meta_key", columns={"meta_key"})})
 */
class Usermeta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="bigint", nullable=false, options={"unsigned"=true})
     */
    protected $userId = '0';

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
     * @ORM\Column(name="umeta_id", type="bigint", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $umetaId;

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Usermeta
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

    /**
     * Set metaKey
     *
     * @param string $metaKey
     *
     * @return Usermeta
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
     * @return Usermeta
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
     * Get umetaId
     *
     * @return integer
     */
    public function getUmetaId()
    {
        return $this->umetaId;
    }
}
