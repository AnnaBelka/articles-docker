<?php

namespace Classes\Models;

use \Illuminate\Database\Eloquent\Model;

abstract class Article extends Model
{

    protected $table = "articles";
    protected $fillable = array("title", "author_id", "topic_id", "description", "image", "count_views", "publish_date");

    public function authors()
    {
        return $this->hasOne('Classes\Models\Authors');
    }

    public function topic()
    {
        return $this->hasOne('Classes\Models\Topic');
    }

}