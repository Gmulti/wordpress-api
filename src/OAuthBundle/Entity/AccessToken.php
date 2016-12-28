<?php

namespace OAuthBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;

/**
 * @ORM\Entity
 * @ORM\Table
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class AccessToken extends AbstractToken
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $accessToken;

    /**
     * @ORM\ManyToOne(targetEntity="WordPressBundle\Entity\User", inversedBy="accessTokens")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="ID")
     */
    protected $user;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $expires;

    /**
     * @ORM\Column(type="string")
     */
    protected $scopes;

    /**
     * @ORM\ManyToOne(targetEntity="OAuthBundle\Entity\Client", inversedBy="accessTokens")
     */
    protected $client;

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
    protected $updatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $deletedAt;

    public function __construct(array $roles = array()){
        parent::__construct($roles);

        $this->setAuthenticated(count($roles) > 0);
    }


    /**
     * Set expires
     *
     * @param  \DateTime   $expires
     * @return AccessToken
     */
    public function setExpires($expires)
    {
        if (!$expires instanceof \DateTime) {
            // @see https://github.com/bshaffer/oauth2-server-bundle/issues/24
            $dateTime = new \DateTime();
            $dateTime->setTimestamp($expires);
            $expires = $dateTime;
        }

        $this->expires = $expires;

        return $this;
    }

    /**
     * Implements getCredentials from Symfony\Component\Security\Core\Authentication\Token\AbstractToken
     */
    public function getCredentials()
    {
        return '';
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
     * Set accessToken
     *
     * @param string $accessToken
     *
     * @return AccessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * Get accessToken
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Get expires
     *
     * @return \DateTime
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set scopes
     *
     * @param string $scopes
     *
     * @return AccessToken
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return AccessToken
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return AccessToken
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return AccessToken
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set client
     *
     * @param \OAuthBundle\Entity\Client $client
     *
     * @return AccessToken
     */
    public function setClient(\OAuthBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \OAuthBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set user
     *
     * @param \WordPressBundle\Entity\User $user
     *
     * @return AccessToken
     */
    public function setUser($user = null)
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
}
