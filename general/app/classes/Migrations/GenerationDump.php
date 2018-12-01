<?php

namespace Classes\Migrations;

use Classes\Controllers\Controller;
use Classes\Migrations\Seeders\ArticlesTableSeeder;

use Classes\Migrations\Seeders\AuthorsTableSeeder;
use Classes\Migrations\Seeders\TopicsTableSeeder;
use Faker\Factory;

class GenerationDump extends Controller
{
    public $db;
    protected $faker;


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        /*$seederTopics = new TopicsTableSeeder();
        $seederTopics->run();*/
        /*$seederAuthors = new AuthorsTableSeeder();
        $seederAuthors->run();*/
        $seederAuthors = new ArticlesTableSeeder();
        $seederAuthors->run();
    }

    /*public function createTableArticles()
    {
        $query = "CREATE TABLE `articles` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `title` varchar(255) NOT NULL,
              `author_id` int(11) NOT NULL DEFAULT '0',
              `topic_id` int(11) NOT NULL DEFAULT '0',
              `description` text NOT NULL,
              `created_at` date NOT NULL,
              `image` varchar(255) NOT NULL DEFAULT '',
              `count_views` int(11) NOT NULL DEFAULT '1',
              PRIMARY KEY (`id`),
              KEY `tag_id` (`topic_id`),
              KEY `created_at` (`created_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        return $this->db->query($query);
    }

    public function createTableAuthors()
    {
        $query = "CREATE TABLE `authors` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `lastname` varchar(255) NOT NULL,
            PRIMARY KEY (`id`),
            KEY `name` (`name`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        return $this->db->query($query);
    }

    public function createTableTopics()
    {
        $query = "CREATE TABLE `topics` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        return $this->db->query($query);

    }

    public function generationAuthors()
    {
        for ($i=1; $i <= 5000; $i++) {
            $name = $this->faker->firstName;
            $lastname = $this->faker->lastName;
            $query = "INSERT INTO `authors` (`name`, `lastname`) VALUES ('$name', '$lastname')";
            $this->db->exec($query);
        }
        echo 'add id='.$this->db->lastInsertId();
    }

    public function generationTopics()
    {
        $names = ["Природа", "Животные","Зоопарки", "Цветы", "Растения", "Любовь", 'Романтика', "Мужчины","Женщины", "Дети", "Молодежь", "Быт", 'Расставание', "Дипрессия","Социум", "Города", "Путешествия", "Отношения", 'Спорт', "Игры","Соревнования", "Победы", "Разочарования", "Беременность", 'Больницы', "Болезни","Аптеки", "Дружба", "Вражда", "Эмоции", 'Наказание', "Тюрьма", "Мебель", "Богатство", "Деньги", "Знаменитости"];
        foreach ($names as $name) {
            $query = "INSERT INTO `topics` (`name`) VALUES ('$name')";
            $this->db->exec($query);
        }
        echo 'add id='.$this->db->lastInsertId();
    }

    public function generationArticles()
    {
        echo 'start=';
        $start =  time();
        echo $start;
        $column = $this->db->query("SELECT MAX(`id`) FROM `articles`");
        $lastid = $column->fetchColumn();
        var_dump($lastid);
        echo '<br>';

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

                $dateTime = $this->faker->dateTimeThisCentury('now', null);

                $title = $this->faker->realText($maxNbCharsTitle, $indexSize);
                $description = $this->faker->realText($maxNbCharsDescription, $indexSize);
                $author_id = rand(1, 4999);
                $topic_id = rand(1, 35);

                $created_at = $dateTime->format('Y-m-d H:i:s');
                $image = $this->faker->imageUrl($width, $height, $category);
                $count_views = rand(1, 100);

                $query = "INSERT INTO `articles` (`title`, `author_id`, `topic_id`, `description`,`created_at`, `image`, `count_views`) VALUES ('$title', '$author_id', '$topic_id', '$description', '$created_at', '$image', '$count_views')";

                $this->db->exec($query);
            }
        }
        echo '$i = '. $i;
        echo '<br>';
        echo '$id = '. $this->db->lastInsertId() ;
        echo '<br>';
        echo 'end = ';
        $end = time();
        echo $end;
        echo '<br>';

        echo 'time = ';
        echo $end - $start;
    }

    public function countArticles()
    {
        $column = $this->db->query("SELECT count(`id`) FROM `articles`");
        $count = $column->fetchColumn();
        print_r($count);

    }*/
}