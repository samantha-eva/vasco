<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user
            ->setFirstName('William')
            ->setLastName('Fouquet')
            ->setEmail('user@test.com')
            ->setPassword('$2y$13$S88eMZ.tUMhfxcSRq1TCjeD5FW3wy28woVpfo8gg9ZZx4kpRgBUpq') // = pass
        ;
        $manager->persist($user);

        $manager->flush();
    }
}
