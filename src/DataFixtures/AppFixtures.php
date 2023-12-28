<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Generator;

class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
    }

    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 50; $i++) { 
            $ingredient = new Ingredient();
            $ingredient
                ->setName($this->faker->word())
                ->setPrice($this->faker->randomFloat(min: 1, max: 500, nbMaxDecimals: 2));
            $manager->persist($ingredient);
        }
        $manager->flush();
    }
}
