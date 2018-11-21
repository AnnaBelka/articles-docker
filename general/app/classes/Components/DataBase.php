<?php

namespace Classes\Components;

class DataBase
{
    public static function connect()
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

    }
}