<?php

class Werewolf extends Role
{
    public function __construct()
    {
        $this->setName('Loup Garou');
        $this->setDescription('Vaincre les villageois est son objectif. Durant la nuit les loups-garous se réunissent pour voter qui va être éliminé. Pendant la journée il ne doit pas être démasqué..');
        $this->setAlive(true);
    }
    
    
}