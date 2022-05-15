<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Ignore;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=32, nullable=false, unique=true)
     */
    private $username;
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=320, nullable=false, unique=true)
     */
    private $email;
    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;
    /**
     * @var string|null
     *
     * @ORM\Column(name="profile_pic", type="string", length=128, nullable=false)
     * @Ignore()
     */
    private $profilePic = "default.png";
    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer", nullable=false)
     */
    private $level = '0';
    /**
     * @var int
     *
     * @ORM\Column(name="xp", type="integer", nullable=false)
     */
    private $xp = '0';
    /**
     * @var int
     *
     * @ORM\Column(name="coins", type="integer", nullable=false)
     */
    private $coins = '0';
    /**
     * @var int
     *
     * @ORM\Column(name="nb_win", type="integer", nullable=false)
     */
    private $nbWin = '0';
    /**
     * @var int
     *
     * @ORM\Column(name="nb_loose", type="integer", nullable=false)
     */
    private $nbLoose = '0';

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    /**
     * @ORM\OneToMany(targetEntity=Friends::class, mappedBy="userOne")
     */
    private $friends;

    public function __construct()
    {
        $this->friends = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
      return $this->id;
    }
    public function getUsername(): ?string
    {
      return $this->username;
    }
    public function setUsername(string $username): self
    {
      $this->username = $username;
      return $this;
    }
    public function getEmail(): ?string
    {
      return $this->email;
    }
    public function setEmail(string $email): self
    {
      $this->email = $email;
      return $this;
    }
    public function getPassword(): ?string
    {
      return $this->password;
    }
    public function setPassword(string $password): self
    {
      $this->password = $password;
      return $this;
    }

    public function getProfilePic(): ?string
    {
      return $this->profilePic;
    }

    public function setProfilePic(?string $profilePic): self
    {
      $this->profilePic = $profilePic;
      return $this;
    }
    public function getLevel(): ?int
    {
      return $this->level;
    }
    public function setLevel(int $level): self
    {
      $this->level = $level;
      return $this;
    }
    public function getXp(): ?int
    {
      return $this->xp;
    }
    public function setXp(int $xp): self
    {
      $this->xp = $xp;
      return $this;
    }
    public function getCoins(): ?int
    {
      return $this->coins;
    }
    public function setCoins(int $coins): self
    {
      $this->coins = $coins;
      return $this;
    }
    public function getNbWin(): ?int
    {
      return $this->nbWin;
    }
    public function setNbWin(int $nbWin): self
    {
      $this->nbWin = $nbWin;
      return $this;
    }
    public function getNbLoose(): ?int
    {
      return $this->nbLoose;
    }
    public function setNbLoose(int $nbLoose): self
    {
      $this->nbLoose = $nbLoose;
      return $this;
    }
    public function getRoles() : array 
  		{
  			return [];
  		}
    public function eraseCredentials(){}
    public function getUserIdentifier() : string
  		{
  			return $this->getEmail();
  		}

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function setProfilePicName($profilePic)
    {
        $this->profilePic = $profilePic;

        return $this;
    }

    public function getProfilePicName()
    {
        return $this->profilePic;
    }

    public function serialize()
    {
        $this->profileImage = base64_encode($this->profileImage);
    }

    public function unserialize($serialized)
    {
        $this->profileImage = base64_decode($this->profileImage);

    }

    /**
     * @return Collection<int, Friends>
     */
    public function getFriends(): Collection
    {
        return $this->friends;
    }

    public function addFriend(Friends $friend): self
    {
        if (!$this->friends->contains($friend)) {
            $this->friends[] = $friend;
            $friend->setUserOne($this);
        }

        return $this;
    }

    public function removeFriend(Friends $friend): self
    {
        if ($this->friends->removeElement($friend)) {
            // set the owning side to null (unless already changed)
            if ($friend->getUserOne() === $this) {
                $friend->setUserOne(null);
            }
        }

        return $this;
    }
}
