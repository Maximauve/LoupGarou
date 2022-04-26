<?php

class Villager extends Role
{
    public function __construct()
    {
        $this->setName('Villageois');
        $this->setDescription('Son objectif est de vaincre les Loups-Garous. Sa parole est son seul pouvoir de persuasion pour éliminer les Loups-Garous. Il doit rester à l\'affût d\'indices, et identifier les coupables.');
        $this->setAlive(true);
    }
}