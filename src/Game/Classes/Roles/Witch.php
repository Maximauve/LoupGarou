<?php

class Witch extends Role
{
    private bool $heal = true;

    private bool $dead = true;

    public function __construct()
    {
        $this->setName('Sorcière');
        $this->setDescription('Son objectif est de vaincre les Loups-Garous. Elle se réveille chaque nuit et peut utiliser une de ses deux potions : soigner la victime des Loups-Garous, ou tuer quelqu’un.');
        $this->setAlive(true);
    }

    public function getHeal(): bool
    {
        return $this->heal;
    }

    public function getDead() : bool
    {
        return $this->dead;
    }

    public function heal(Player $player)
    {
        if (!$player->getAlive() && $this->getHeal()) {
            $player->setAlive(true);
            $this->heal = false;
        } else if (!$this->getHeal()) { // verif mais normalement on y rentre pas
            print_r('Vous avez déjà utilisé votre potion de soin.');
        } else {
            print_r('Le joueur n\'est pas mort.');
        }
    }

    public function dead(Player $player)
    {
        if ($player->getAlive() && $this->getDead()) {
            $player->setAlive(false);
            $this->dead = false;
        } else if (!$this->getDead()) {
            print_r('Vous avez déjà utilisé votre potion de mort.');
        } else {
            print_r('Le joueur est déjà mort.');
        }
    }
}