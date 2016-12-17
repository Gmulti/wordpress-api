<?php

namespace WordPressBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ApiResource(attributes={
        "filters"={
            "user.search"
        }
    }
)
 * @ORM\Entity
 * @ORM\Table(name="wp_users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint", name="ID")
     */
    protected $id;

    /**
     *
     * @ORM\Column(type="string", name="user_login")
     */
    protected $userLogin;

    /**
     *
     * @ORM\Column(type="string", name="user_nicename")
     */
    protected $userNicename;

    /**
     *
     * @ORM\Column(type="string", name="user_email")
     */
    protected $userEmail;

    /**
     *
     * @ORM\Column(type="string", name="user_url")
     */
    protected $userUrl;

    /**
     *
     * @ORM\Column(type="string", name="user_registered")
     */
    protected $userRegistered;

    /**
     *
     * @ORM\Column(type="integer", name="user_status")
     */
    protected $userStatus;

    /**
     *
     * @ORM\Column(type="string", name="display_name")
     */
    protected $displayName;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userLogin
     *
     * @param string $userLogin
     *
     * @return User
     */
    public function setUserLogin($userLogin)
    {
        $this->userLogin = $userLogin;

        return $this;
    }

    /**
     * Get userLogin
     *
     * @return string
     */
    public function getUserLogin()
    {
        return $this->userLogin;
    }

    /**
     * Set userNicename
     *
     * @param string $userNicename
     *
     * @return User
     */
    public function setUserNicename($userNicename)
    {
        $this->userNicename = $userNicename;

        return $this;
    }

    /**
     * Get userNicename
     *
     * @return string
     */
    public function getUserNicename()
    {
        return $this->userNicename;
    }

    /**
     * Set userEmail
     *
     * @param string $userEmail
     *
     * @return User
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Set userUrl
     *
     * @param string $userUrl
     *
     * @return User
     */
    public function setUserUrl($userUrl)
    {
        $this->userUrl = $userUrl;

        return $this;
    }

    /**
     * Get userUrl
     *
     * @return string
     */
    public function getUserUrl()
    {
        return $this->userUrl;
    }

    /**
     * Set userRegistered
     *
     * @param string $userRegistered
     *
     * @return User
     */
    public function setUserRegistered($userRegistered)
    {
        $this->userRegistered = $userRegistered;

        return $this;
    }

    /**
     * Get userRegistered
     *
     * @return string
     */
    public function getUserRegistered()
    {
        return $this->userRegistered;
    }

    /**
     * Set userStatus
     *
     * @param integer $userStatus
     *
     * @return User
     */
    public function setUserStatus($userStatus)
    {
        $this->userStatus = $userStatus;

        return $this;
    }

    /**
     * Get userStatus
     *
     * @return integer
     */
    public function getUserStatus()
    {
        return $this->userStatus;
    }

    /**
     * Set displayName
     *
     * @param string $displayName
     *
     * @return User
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }
}
