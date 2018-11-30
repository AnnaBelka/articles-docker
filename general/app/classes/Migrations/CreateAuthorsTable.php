<?php

namespace Classes\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Выполнение миграций.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->timestamps();

            $table->index('lastname');
        });
    }



    /**
     * Отмена миграций.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('authors');
    }
}