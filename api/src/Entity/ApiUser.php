<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ApiUserRepository")
 */
class ApiUser extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AccessToken", mappedBy="user")
     */
    protected $accessTokens;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AuthCode", mappedBy="user")
     */
    protected $authCodes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RefreshToken", mappedBy="user")
     */
    protected $refreshTokens;

    public function __construct()
    {
        parent::__construct();
        $this->accessTokens = new ArrayCollection();
        $this->authCodes = new ArrayCollection();
        $this->refreshTokens = new ArrayCollection();
    }

    /**
     * @return Collection|AccessToken[]
     */
    public function getAccessTokens(): Collection
    {
        return $this->accessTokens;
    }

    public function addAccessToken(AccessToken $accessToken): self
    {
        if (!$this->accessTokens->contains($accessToken)) {
            $this->accessTokens[] = $accessToken;
            $accessToken->setUser($this);
        }

        return $this;
    }

    public function removeAccessToken(AccessToken $accessToken): self
    {
        if ($this->accessTokens->contains($accessToken)) {
            $this->accessTokens->removeElement($accessToken);
            // set the owning side to null (unless already changed)
            if ($accessToken->getUser() === $this) {
                $accessToken->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AuthCode[]
     */
    public function getAuthCodes(): Collection
    {
        return $this->authCodes;
    }

    public function addAuthCode(AuthCode $authCode): self
    {
        if (!$this->authCodes->contains($authCode)) {
            $this->authCodes[] = $authCode;
            $authCode->setUser($this);
        }

        return $this;
    }

    public function removeAuthCode(AuthCode $authCode): self
    {
        if ($this->authCodes->contains($authCode)) {
            $this->authCodes->removeElement($authCode);
            // set the owning side to null (unless already changed)
            if ($authCode->getUser() === $this) {
                $authCode->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RefreshToken[]
     */
    public function getRefreshTokens(): Collection
    {
        return $this->refreshTokens;
    }

    public function addRefreshToken(RefreshToken $refreshToken): self
    {
        if (!$this->refreshTokens->contains($refreshToken)) {
            $this->refreshTokens[] = $refreshToken;
            $refreshToken->setUser($this);
        }

        return $this;
    }

    public function removeRefreshToken(RefreshToken $refreshToken): self
    {
        if ($this->refreshTokens->contains($refreshToken)) {
            $this->refreshTokens->removeElement($refreshToken);
            // set the owning side to null (unless already changed)
            if ($refreshToken->getUser() === $this) {
                $refreshToken->setUser(null);
            }
        }

        return $this;
    }

}
