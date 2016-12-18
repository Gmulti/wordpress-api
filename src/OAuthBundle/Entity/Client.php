<?php

namespace OAuthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity
 * @ORM\Table
 * @UniqueEntity({"clientId"})
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $clientId;

    /**
     * @ORM\Column(type="string")
     */
    protected $clientSecret;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    protected $redirectUri = array();

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    protected $grantTypes;


    /**
     * @ORM\ManyToOne(targetEntity="WordPressBundle\Entity\User", inversedBy="clients")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="ID")
     */
    protected $user;

    /**
     * @ORM\OneToMany(targetEntity="OAuthBundle\Entity\AccessToken", mappedBy="client", cascade={"persist","remove"}, orphanRemoval=true)
     */
    protected $accessTokens;

    /**
     * @ORM\ManyToOne(targetEntity="OAuthBundle\Entity\AccessLimit", inversedBy="clients")
     */
    protected $accessLimit;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $scopes;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $name;

    /**
     * @var date $created
     *
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * @var date $updated
     *
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable
     */
    protected $updatedAT;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->accessTokens = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set clientId
     *
     * @param string $clientId
     *
     * @return Client
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set clientSecret
     *
     * @param string $clientSecret
     *
     * @return Client
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * Get clientSecret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Set redirectUri
     *
     * @param array $redirectUri
     *
     * @return Client
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }

    /**
     * Get redirectUri
     *
     * @return array
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * Set grantTypes
     *
     * @param array $grantTypes
     *
     * @return Client
     */
    public function setGrantTypes($grantTypes)
    {
        $this->grantTypes = $grantTypes;

        return $this;
    }

    /**
     * Get grantTypes
     *
     * @return array
     */
    public function getGrantTypes()
    {
        return $this->grantTypes;
    }

    /**
     * Set scopes
     *
     * @param string $scopes
     *
     * @return Client
     */
    public function setScopes($scopes)
    {
        $this->scopes = $scopes;

        return $this;
    }

    /**
     * Get scopes
     *
     * @return string
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Client
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Client
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAT
     *
     * @param \DateTime $updatedAT
     *
     * @return Client
     */
    public function setUpdatedAT($updatedAT)
    {
        $this->updatedAT = $updatedAT;

        return $this;
    }

    /**
     * Get updatedAT
     *
     * @return \DateTime
     */
    public function getUpdatedAT()
    {
        return $this->updatedAT;
    }

    /**
     * Set user
     *
     * @param \WordPressBundle\Entity\User $user
     *
     * @return Client
     */
    public function setUser(\WordPressBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \WordPressBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add accessToken
     *
     * @param \OAuthBundle\Entity\AccessToken $accessToken
     *
     * @return Client
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

    /**
     * Set accessLimit
     *
     * @param \OAuthBundle\Entity\AccessLimit $accessLimit
     *
     * @return Client
     */
    public function setAccessLimit(\OAuthBundle\Entity\AccessLimit $accessLimit = null)
    {
        $this->accessLimit = $accessLimit;

        return $this;
    }

    /**
     * Get accessLimit
     *
     * @return \OAuthBundle\Entity\AccessLimit
     */
    public function getAccessLimit()
    {
        return $this->accessLimit;
    }
}
