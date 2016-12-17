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
 * @ORM\Table(name="wp_usermeta")
 */
class Usermeta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", name="umeta_id")
     */
    protected $umetaId;

    /**
     *
     * @ORM\Column(type="bigint", name="user_id")
     */
    protected $userId;

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
     * Get umetaId
     *
     * @return integer
     */
    public function getUmetaId()
    {
        return $this->umetaId;
    }

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
}
