<?php

namespace WordPressBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ApiResource(attributes={
        "filters"={
            "term_relationship.search"
        }
    }
)
 * @ORM\Entity
 * @ORM\Table(name="wp_term_relationships")
 */
class TermRelationship
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", name="object_id")
     */
    protected $objectId;

    /**
     *
     * @ORM\Column(type="bigint", name="term_taxonomy_id")
     */
    protected $termTaxonomyId;

    /**
     *
     * @ORM\Column(type="integer", name="term_order")
     */
    protected $termOrder;



    /**
     * Get objectId
     *
     * @return integer
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set termTaxonomyId
     *
     * @param integer $termTaxonomyId
     *
     * @return TermRelationship
     */
    public function setTermTaxonomyId($termTaxonomyId)
    {
        $this->termTaxonomyId = $termTaxonomyId;

        return $this;
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

    /**
     * Set termOrder
     *
     * @param integer $termOrder
     *
     * @return TermRelationship
     */
    public function setTermOrder($termOrder)
    {
        $this->termOrder = $termOrder;

        return $this;
    }

    /**
     * Get termOrder
     *
     * @return integer
     */
    public function getTermOrder()
    {
        return $this->termOrder;
    }
}
