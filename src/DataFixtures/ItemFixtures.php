<?php

namespace App\DataFixtures;

use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ItemFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $item = new Item();
				$item->setName('Talisman de Loup-Garou');
				$item->setPrice(100);
				$manager->persist($item);

        $manager->flush();
    }
}
