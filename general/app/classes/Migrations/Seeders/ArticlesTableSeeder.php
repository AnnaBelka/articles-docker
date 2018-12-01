<?php

namespace Classes\Migrations\Seeders;

use Classes\Models\Article;
use Faker\Factory;

class ArticlesTableSeeder extends Article {

    public $faker;

    public function run()
    {
        $this->faker = Factory::create("ru_RU");
        $lastid = Article::select('id')->get()->last();
        echo '$lastid = ' . $lastid;
        if ($lastid <=500000) {
            for ($i = 1; $i <= 100000; $i++) {
                $width = rand(200, 800);
                $height = rand(200, 800);
                $maxNbCharsTitle = rand(10, 200);
                $maxNbCharsDescription = rand(10, 15000);
                $indexSize = rand(1, 4);
                $categories = array(
                    'abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife',
                    'fashion', 'people', 'nature', 'sports', 'technics', 'transport'
                );
                $key = array_rand($categories);
                $category = $categories[$key];
                /*if ($lastid < 100000 && $i <= 1500) {
                    $dateTime = $this->faker->dateTimeThisDecade('now', null);
                } else {*/
                    $dateTime = $this->faker->dateTimeThisYear('now', null);
//                }

                $title = $this->faker->realText($maxNbCharsTitle, $indexSize);
                $description = $this->faker->realText($maxNbCharsDescription, $indexSize);
                $author_id = rand(1, 4999);
                $topic_id = rand(1, 35);

                $publish_date = $dateTime->format('Y-m-d');
                $image = $this->faker->imageUrl($width, $height, $category);
                $count_views = rand(1, 100);
                $article = Article::create([
                    'title' => $title,
                    'author_id' => $author_id,
                    'topic_id' => $topic_id,
                    'description' => $description,
                    'image' => $image,
                    'count_views' => $count_views,
                    'publish_date' => $publish_date,
                ]);
            }
        }


        $lastidsave = $article->id;
        echo '$lastidsave = ' . $lastidsave;
        if ($lastid >= $lastidsave) {
            echo "Таблица Articles заполнена";
        }


    }

}