<?php

namespace WordPressBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ApiResource(attributes={
        "filters"={
            "termmeta.search"
        }
    }
)
 * @ORM\Entity
 * @ORM\Table(name="wp_termmeta")
 */
class Termmeta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", name="meta_id")
     */
    protected $metaId;

    /**
     *
     * @ORM\Column(type="bigint", name="term_id")
     */
    protected $termId;

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
     * Set termId
     *
     * @param integer $termId
     *
     * @return Termmeta
     */
    public function setTermId($termId)
    {
        $this->termId = $termId;

        return $this;
    }

    /**
     * Get termId
     *
     * @return integer
     */
    public function getTermId()
    {
        return $this->termId;
    }

    /**
     * Set metaKey
     *
     * @param string $metaKey
     *
     * @return Termmeta
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
     * @return Termmeta
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
