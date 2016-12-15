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
 * @ORM\Table(name="wp_terms")
 */
class Term
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", name="term_id")
     */
    protected $termId;

    /**
     *
     * @ORM\Column(type="string", name="name")
     */
    protected $name;

    /**
     *
     * @ORM\Column(type="string", name="slug")
     */
    protected $slug;

    /**
     *
     * @ORM\Column(type="integer", name="term_group")
     */
    protected $termGroup;



    /**
     * Set termId
     *
     * @param integer $termId
     *
     * @return Term
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
}
