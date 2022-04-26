<?php

use Player;

class Seer extends Role
{
    public function __construct()
    {
        $this->setName('Voyante');
        $this->setDescription('Son objectif est de vaincre les Loups-Garous. Chaque nuit, elle peut connaître le rôle d\'un joueur qu\'elle aura choisi. Elle doit aider les innocents sans se faire démasquer.');
        $this->setAlive(true);
    }

    public function seeRole(Player $player)
    {
        return $player->getRole()->getName();
    }
} 