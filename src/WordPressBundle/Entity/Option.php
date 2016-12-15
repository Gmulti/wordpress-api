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
 * @ORM\Table(name="wp_options")
 */
class Option
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", name="option_id")
     */
    protected $optionId;

    /**
     *
     * @ORM\Column(type="string", name="option_name")
     */
    protected $optionName;

    /**
     *
     * @ORM\Column(type="text", name="option_value")
     */
    protected $optionValue;

    /**
     *
     * @ORM\Column(type="string", name="autoload")
     */
    protected $autoload;


    /**
     * Get optionId
     *
     * @return integer
     */
    public function getOptionId()
    {
        return $this->optionId;
    }

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
}
