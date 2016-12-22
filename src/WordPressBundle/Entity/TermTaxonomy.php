<?php

namespace WordPressBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ApiResource(attributes={
        "filters"={
            "term_taxonomy.search"
        }
    }
)
 * @ORM\Entity
 * @ORM\Table(name="wp_term_taxonomy", uniqueConstraints={@ORM\UniqueConstraint(name="term_id_taxonomy", columns={"term_id", "taxonomy"})}, indexes={@ORM\Index(name="taxonomy", columns={"taxonomy"})})
 */
class TermTaxonomy
{
     /**
     * @var integer
     *
     * @ORM\Column(name="term_taxonomy_id", type="bigint", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $termTaxonomyId;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="term_id", type="bigint", nullable=false, options={"unsigned"=true})
     */
    protected $termId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="taxonomy", type="string", length=32, nullable=false)
     */
    protected $taxonomy = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    protected $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="parent", type="bigint", nullable=false, options={"unsigned"=true})
     */
    protected $parent = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="count", type="bigint", nullable=false)
     */
    protected $count = '0';

    /**
     * Set termId
     *
     * @param integer $termId
     *
     * @return TermTaxonomy
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
     * Set taxonomy
     *
     * @param string $taxonomy
     *
     * @return TermTaxonomy
     */
    public function setTaxonomy($taxonomy)
    {
        $this->taxonomy = $taxonomy;

        return $this;
    }

    /**
     * Get taxonomy
     *
     * @return string
     */
    public function getTaxonomy()
    {
        return $this->taxonomy;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return TermTaxonomy
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set parent
     *
     * @param integer $parent
     *
     * @return TermTaxonomy
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return integer
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set count
     *
     * @param integer $count
     *
     * @return TermTaxonomy
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Get termTaxonomyId
     *
     * @return integer
     */
    public function getTermTaxonomyId()
    {
        return $this->termTaxonomyId;
    }
}
