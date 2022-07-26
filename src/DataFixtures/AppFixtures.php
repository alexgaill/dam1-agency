<?php

namespace App\DataFixtures;

use App\Entity\Bien;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 20; $i++) { 
            $randTransactionType = rand(0, 1); // 0 => Location, 1 => Vente
            $randTypeBien = rand(0, 2); // 0 => Appartement, 1 => Maison, 2 => Villa
            $bien = (new Bien)
                    ->setTitre($faker->words(3, true))
                    ->setDescription($faker->paragraph(4, true))
                    ->setTransactionType($randTransactionType)
                    ->setTypeBien($randTypeBien)
                    ->setSurface($faker->numberBetween(11, 200))
                    ->setSurfaceTerrain($randTypeBien !== 0 ? $faker->randomNumber(4, false): null)
                    ->setNbPieces($faker->randomDigitNotZero())
                    ->setEtage($randTypeBien === 0 ? $faker->randomDigit() : 0)
                    ->setAdresse($faker->address())
                    ->setCodePostal($faker->postcode())
                    ->setVille($faker->city())
                    ->setPrix($randTransactionType === 0 ? $faker->numberBetween(300, 2000) : $faker->numberBetween(100000, 5000000))
                    ->setDateConstruction($faker->dateTime())
            ;

            $manager->persist($bien);
        }

        $manager->flush();
    }
}
