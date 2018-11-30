<?php

namespace Classes\Models;

use \Illuminate\Database\Eloquent\Model;

abstract class Topic extends Model
{

    protected $table = "topics";
    protected $fillable = array("name");

    public function articles() {
        return $this->hasMany('Classes\Models\Article');
    }

//    abstract public function count(array $filter) : int;
}