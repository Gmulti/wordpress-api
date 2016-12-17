<?php

namespace WordPressBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ApiResource(attributes={
        "filters"={
            "link.search"
        }
    }
)
 * @ORM\Entity
 * @ORM\Table(name="wp_links")
 */
class Link
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", name="link_id")
     */
    protected $linkId;

    /**
     *
     * @ORM\Column(type="string", name="link_url")
     */
    protected $linkUrl;

    /**
     *
     * @ORM\Column(type="string", name="link_name")
     */
    protected $linkName;

    /**
     *
     * @ORM\Column(type="string", name="link_image")
     */
    protected $linkImage;

    /**
     *
     * @ORM\Column(type="string", name="link_target")
     */
    protected $linkTarget;

    /**
     *
     * @ORM\Column(type="string", name="link_description")
     */
    protected $linkDescription;


}