<?php

namespace Classes\Migrations;

use Classes\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\DatabaseManager;

class CreateArticlesTable extends Migration
{

    /**
     * Выполнение миграций.
     *
     * @return void
     */
    public function up()
    {

        $query = "CREATE TABLE `articles` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `title` varchar(255) NOT NULL,
              `author_id` int(11) NOT NULL DEFAULT '0',
              `topic_id` int(11) NOT NULL DEFAULT '0',
              `description` text NOT NULL,
              `publish_date` DATE NOT NULL,
              `image` varchar(255) NOT NULL DEFAULT '',
              `count_views` int(11) NOT NULL DEFAULT '1',
              `created_at` TIMESTAMP DEFAULT NULL,
              `updated_at` TIMESTAMP DEFAULT NULL,
              PRIMARY KEY (`id`),
              KEY `tag_id` (`topic_id`),
              KEY `author_id` (`author_id`),
              KEY `publish_date` (`publish_date`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        Article::selectRaw($query);

        /*Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('author_id')->default(0)->unsigned();
            $table->integer('topic_id')->default(0)->unsigned();
            $table->text('description');
            $table->string('image')->default('');
            $table->integer('count_views')->default(1)->unsigned();
            $table->date('publish_date');
            $table->timestamps();

            $table->index('author_id');
            $table->index('topic_id');
            $table->index('publish_date');
        });*/
    }



    /**
     * Отмена миграций.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}