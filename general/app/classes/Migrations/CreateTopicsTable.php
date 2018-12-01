<?php

namespace Classes\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Выполнение миграций.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

            $table->index('name');
        });

        $query = "
          CREATE TABLE `topics` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `created_at` TIMESTAMP DEFAULT NULL,
            `updated_at` TIMESTAMP DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `name` (`name`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ";
    }


    /**
     * Отмена миграций.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('topics');
    }
}