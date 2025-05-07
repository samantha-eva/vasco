<?php

namespace App\DataFixtures;

use App\Entity\Operation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class OperationFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        //je suis passé passer par faker pour génerer des fausses données pour le nom de l'operation
        $faker = Factory::create();

        //j'ai enregitrer le type en tant que string mais pour que ce soit plus propre:
        //creer un dossier enum et creer une OperationType pour integrer SCPI et Club-Deal
        //appeler directement OpertationType dans le tableau
        $types =["SCPI", "Club-Deal"];
        $operationCount = 9;

        //une boucle pour avoir plusieurs operations de manière dynamique

        for($i = 0; $i < $operationCount; $i++){

            $operation = new Operation();
            $operation
                ->setNom($faker->company)
                ->setType($types[array_rand($types)]); // permet d'avoir les types de manière aleatoire
            ;
            $manager->persist($operation);

        }

        $manager->flush();
    }

}