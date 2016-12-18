<?php

namespace WordPressBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use OAuthBundle\User\OAuth2UserInterface;

/**
 *
 * @ApiResource(attributes={
        "filters"={
            "user.search"
        }
    }
)
 * @ORM\Entity(repositoryClass="WordPressBundle\Repository\UserRepository")
 * @ORM\Table(name="wp_users", indexes={@ORM\Index(name="user_login_key", columns={"user_login"}), @ORM\Index(name="user_nicename", columns={"user_nicename"}), @ORM\Index(name="user_email", columns={"user_email"})})
 */
class User implements OAuth2UserInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="user_login", type="string", length=60, nullable=false)
     */
    protected $userLogin = '';

    /**
     * @var string
     *
     * @ORM\Column(name="user_pass", type="string", length=255, nullable=false)
     */
    protected $userPass = '';

    /**
     * @var string
     *
     * @ORM\Column(name="user_nicename", type="string", length=50, nullable=false)
     */
    protected $userNicename = '';

    /**
     * @var string
     *
     * @ORM\Column(name="user_email", type="string", length=100, nullable=false)
     */
    protected $userEmail = '';

    /**
     * @var string
     *
     * @ORM\Column(name="user_url", type="string", length=100, nullable=false)
     */
    protected $userUrl = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_registered", type="datetime", nullable=false)
     */
    protected $userRegistered = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="user_activation_key", type="string", length=255, nullable=false)
     */
    protected $userActivationKey = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="user_status", type="integer", nullable=false)
     */
    protected $userStatus = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="display_name", type="string", length=250, nullable=false)
     */
    protected $displayName = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

     /**
     * @ORM\OneToMany(targetEntity="OAuthBundle\Entity\Client", mappedBy="user")
     */
    protected $clients;

    /**
     * @ORM\OneToMany(targetEntity="OAuthBundle\Entity\AccessToken", mappedBy="user")
     */
    protected $accessTokens;



    /**
     * Get scopes
     *
     * @return array
     */
    public function getScopes()
    {
        return array();
    }

    /**
     * Get scope
     *
     * @return string
     */
    public function getScope()
    {

        if(!empty($this->getScopes())){
            return implode(' ', $this->getScopes());
        }
        return array();
    }

    public function getRoles(){
        return array();
    }

    public function getPassword(){
        return $this->getUserPass();
    }

    public function getSalt(){
        return null;
    }

    public function getUsername(){
        return $this->userLogin;
    }

    /**
     * Erase credentials
     *
     * @return void
     */
    public function eraseCredentials()
    {
        // We don't hold anything sensitivie, do nothing
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clients = new \Doctrine\Common\Collections\ArrayCollection();
        $this->accessTokens = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set userPass
     *
     * @param string $userPass
     *
     * @return User
     */
    public function setUserPass($userPass)
    {
        $this->userPass = $userPass;

        return $this;
    }

    /**
     * Get userPass
     *
     * @return string
     */
    public function getUserPass()
    {
        return $this->userPass;
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
     * @param \DateTime $userRegistered
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
     * @return \DateTime
     */
    public function getUserRegistered()
    {
        return $this->userRegistered;
    }

    /**
     * Set userActivationKey
     *
     * @param string $userActivationKey
     *
     * @return User
     */
    public function setUserActivationKey($userActivationKey)
    {
        $this->userActivationKey = $userActivationKey;

        return $this;
    }

    /**
     * Get userActivationKey
     *
     * @return string
     */
    public function getUserActivationKey()
    {
        return $this->userActivationKey;
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
     * Add client
     *
     * @param \OAuthBundle\Entity\Client $client
     *
     * @return User
     */
    public function addClient(\OAuthBundle\Entity\Client $client)
    {
        $this->clients[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \OAuthBundle\Entity\Client $client
     */
    public function removeClient(\OAuthBundle\Entity\Client $client)
    {
        $this->clients->removeElement($client);
    }

    /**
     * Get clients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Add accessToken
     *
     * @param \OAuthBundle\Entity\AccessToken $accessToken
     *
     * @return User
     */
    public function addAccessToken(\OAuthBundle\Entity\AccessToken $accessToken)
    {
        $this->accessTokens[] = $accessToken;

        return $this;
    }

    /**
     * Remove accessToken
     *
     * @param \OAuthBundle\Entity\AccessToken $accessToken
     */
    public function removeAccessToken(\OAuthBundle\Entity\AccessToken $accessToken)
    {
        $this->accessTokens->removeElement($accessToken);
    }

    /**
     * Get accessTokens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAccessTokens()
    {
        return $this->accessTokens;
    }
}
