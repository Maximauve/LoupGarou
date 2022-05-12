<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", nullable=false)
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $nbPlayers;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $nbWitch;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $nbSeer;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $nbHunter;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $nbVillager;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $nbWerewolf;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $start;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPlayers(): ?int
    {
        return $this->nbPlayers;
    }

    public function setNbPlayers(int $nbPlayers): self
    {
        $this->nbPlayers = $nbPlayers;

        return $this;
    }

    public function getNbWitch(): ?int
    {
        return $this->nbWitch;
    }

    public function setNbWitch(int $nbWitch): self
    {
        $this->nbWitch = $nbWitch;

        return $this;
    }

    public function getNbSeer(): ?int
    {
        return $this->nbSeer;
    }

    public function setNbSeer(int $nbSeer): self
    {
        $this->nbSeer = $nbSeer;

        return $this;
    }

    public function getNbHunter(): ?int
    {
        return $this->nbHunter;
    }

    public function setNbHunter(int $nbHunter): self
    {
        $this->nbHunter = $nbHunter;

        return $this;
    }

    public function getNbVillager(): ?int
    {
        return $this->nbVillager;
    }

    public function setNbVillager(int $nbVillager): self
    {
        $this->nbVillager = $nbVillager;

        return $this;
    }

    public function getNbWerewolf(): ?int
    {
        return $this->nbWerewolf;
    }

    public function setNbWerewolf(int $nbWerewolf): self
    {
        $this->nbWerewolf = $nbWerewolf;

        return $this;
    }

    public function getStart(): ?bool
    {
        return $this->start;
    }

    public function setStart(bool $start): self
    {
        $this->start = $start;

        return $this;
    }
}
