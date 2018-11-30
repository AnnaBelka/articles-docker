<?php

namespace Classes\Migrations\Seeders;

use Classes\Models\Author;
use Faker\Factory;

class AuthorsTableSeeder extends Author {

    public $faker;

    public function run()
    {
        $this->faker = Factory::create("ru_RU");
        for ($i=1; $i <= 5000; $i++) {
            $name = $this->faker->firstName;
            $lastname = $this->faker->lastName;;
            Author::create([
                'name' => $name,
                'lastname' => $lastname
            ]);
        }

        echo "Таблица Authors заполнена";
    }

}