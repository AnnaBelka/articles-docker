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
        /*$seederAuthors = new ArticlesTableSeeder();
        $seederAuthors->run();*/
    }

}