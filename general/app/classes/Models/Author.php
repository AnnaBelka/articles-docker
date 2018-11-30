<?php

namespace Classes\Models;

use \Illuminate\Database\Eloquent\Model;

abstract class Author extends Model
{

    protected $table = "authors";
    protected $fillable = array("name", "lastname");

    public function articles() {
        return $this->hasMany('Classes\Models\Article');
    }


}