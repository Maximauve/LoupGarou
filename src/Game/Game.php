<?php

use Classes\Player;

class Game
{
    private Player $mayor;

    public function getMayor() : Player
    {
        return $this->mayor;
    }

    public function chooseMayor(Player $player)
    {
        $this->mayor = $player;
    }
}