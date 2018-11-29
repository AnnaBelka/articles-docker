<?php

namespace Classes\Models;

use \Illuminate\Database\Eloquent\Model;

abstract class Article extends Model
{
/*    protected $id;
    protected $title;
    protected $author_id;
    protected $topic_id;
    protected $description;
    protected $image;
    protected $created_at;
    protected $count_views;*/

    protected $table = "articles";
    protected $fillable = array("title", "author_id", "topic_id", "description", "image", "count_views", "created_at");

    public function authors()
    {
        return $this->hasOne('Classes\Models\Authors');
    }

    public function topic()
    {
        return $this->hasOne('Classes\Models\Topic');
    }
    /*public function __construct()
    {
        parent::__construct();
    }*/

    /*public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : int
    {
        $this->id = $id;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title) : string
    {
        $this->title = $title;
    }

    public function getAuthorId()
    {
        return $this->author_id;
    }

    public function setAuthorId(int $author_id) : int
    {
        $this->author_id = $author_id;
    }

    public function getTopicId() : int
    {
        return $this->topic_id;
    }

    public function setTopicId(int $topic_id) : int
    {
        $this->topic_id = $topic_id;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription(string $description) : string
    {
        $this->description = $description;
    }

    public function getImage() : string
    {
        return $this->image;
    }

    public function setImage(string $image) : string
    {
        $this->image = $image;
    }

    public function getCreatedAt() : string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at) : string
    {
        $this->created_at = $created_at;
    }

    public function getCountViews() : int
    {
        return $this->count_views;
    }

    public function setCountViews(int $count_views) : int
    {
        $this->count_views = $count_views;
    }*/

    abstract public function count(array $filter) : int;
}