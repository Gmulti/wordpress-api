<?php

namespace WordPressBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ApiResource(attributes={
        "filters"={
            "option.search"
        }
    }
)
 * @ORM\Entity
 * @ORM\Table(name="wp_options", uniqueConstraints={@ORM\UniqueConstraint(name="option_name", columns={"option_name"})})
 */
class Option
{
    /**
     * @var integer
     *
     * @ORM\Column(name="option_id", type="bigint", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $optionId;
    
    /**
     * @var string
     *
     * @ORM\Column(name="option_name", type="string", length=191, nullable=false)
     */
    protected $optionName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="option_value", type="text", nullable=false)
     */
    protected $optionValue;

    /**
     * @var string
     *
     * @ORM\Column(name="autoload", type="string", length=20, nullable=false)
     */
    protected $autoload = 'yes';

    

    /**
     * Set optionName
     *
     * @param string $optionName
     *
     * @return Option
     */
    public function setOptionName($optionName)
    {
        $this->optionName = $optionName;

        return $this;
    }

    /**
     * Get optionName
     *
     * @return string
     */
    public function getOptionName()
    {
        return $this->optionName;
    }

    /**
     * Set optionValue
     *
     * @param string $optionValue
     *
     * @return Option
     */
    public function setOptionValue($optionValue)
    {
        $this->optionValue = $optionValue;

        return $this;
    }

    /**
     * Get optionValue
     *
     * @return string
     */
    public function getOptionValue()
    {
        return $this->optionValue;
    }

    /**
     * Set autoload
     *
     * @param string $autoload
     *
     * @return Option
     */
    public function setAutoload($autoload)
    {
        $this->autoload = $autoload;

        return $this;
    }

    /**
     * Get autoload
     *
     * @return string
     */
    public function getAutoload()
    {
        return $this->autoload;
    }

    /**
     * Get optionId
     *
     * @return integer
     */
    public function getOptionId()
    {
        return $this->optionId;
    }
}
