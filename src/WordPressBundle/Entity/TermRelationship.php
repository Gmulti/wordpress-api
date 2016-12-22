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
 * @ORM\Table(name="wp_term_relationships", indexes={@ORM\Index(name="term_taxonomy_id", columns={"term_taxonomy_id"})})
 */
class TermRelationship
{

    /**
     * @var integer
     *
     * @ORM\Column(name="term_taxonomy_id", type="bigint", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $termTaxonomyId;

    /**
     * @var integer
     *
     * @ORM\Column(name="term_order", type="integer", nullable=false)
     */
    protected $termOrder = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="object_id", type="bigint", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $objectId;
    

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

    /**
     * Set objectId
     *
     * @param integer $objectId
     *
     * @return TermRelationship
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;

        return $this;
    }

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
}
