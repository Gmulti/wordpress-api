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
 * @ORM\Table(name="wp_termmeta", indexes={@ORM\Index(name="term_id", columns={"term_id"}), @ORM\Index(name="meta_key", columns={"meta_key"})})
 */
class Termmeta
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
     * @ORM\Column(name="term_id", type="bigint", nullable=false, options={"unsigned"=true})
     */
    protected $termId = '0';

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
