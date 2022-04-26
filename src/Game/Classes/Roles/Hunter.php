<?php

class Hunter extends Role
{
    public function __construct()
    {
        $this->setName('Chasseur');
        $this->setDescription('Son objectif est de vaincre les Loups-Garous. Lorsque le Chasseur meurt, il a le pouvoir d\'amener un autre joueur avec lui dans sa tombe.');
        $this->setAlive(true);
    }

    public function kill(Player $player)
    {
        $player->setAlive(false);
    }
}