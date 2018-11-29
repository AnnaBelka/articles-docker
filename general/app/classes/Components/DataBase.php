<?php

namespace Classes\Components;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class DataBase
{

    public function __construct()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            "driver" => DBDRIVER,
            "host" => DBHOST,
            "database" => DBNAME,
            "username" => DBUSER,
            "password" => DBPASS,
            "charset" => "utf8",
            "collation" => "utf8_general_ci",
            "prefix" => "",
        ]);


        //$capsule->setEventDispatcher(new Dispatcher(new Container));

        $capsule->setAsGlobal();

        $capsule->bootEloquent();

    }

    /*public static function connect()
    {


        $env = include( __DIR__ . '/../../config/config.php');
        $dsn = "mysql:host={$env['db_host']};dbname={$env['db_name']};port={$env['db_port']}";

        try {
            $db = new \PDO($dsn, $env['db_user'], $env['db_password']);
            $db->exec("set names utf8");

            return $db;
        } catch (\PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }

    }*/
}