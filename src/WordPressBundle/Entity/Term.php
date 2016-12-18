<?php

namespace WordPressBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ApiResource(attributes={
        "filters"={
            "term.search"
        }
    }
)
 * @ORM\Entity
 * @ORM\Table(name="wp_terms", indexes={@ORM\Index(name="slug", columns={"slug"}), @ORM\Index(name="name", columns={"name"})})
 */
class Term
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    protected $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=200, nullable=false)
     */
    protected $slug = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="term_group", type="bigint", nullable=false)
     */
    protected $termGroup = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="term_id", type="bigint", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $termId;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Term
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Term
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set termGroup
     *
     * @param integer $termGroup
     *
     * @return Term
     */
    public function setTermGroup($termGroup)
    {
        $this->termGroup = $termGroup;

        return $this;
    }

    /**
     * Get termGroup
     *
     * @return integer
     */
    public function getTermGroup()
    {
        return $this->termGroup;
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
}
