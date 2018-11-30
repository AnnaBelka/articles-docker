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