<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
				$user->setUsername('Admin');
				$user->setEmail('max.mourgues@gmail.com');
				$user->setPassword(password_hash('Coucou', PASSWORD_BCRYPT));
        $manager->persist($user);

        $manager->flush();
    }
}
