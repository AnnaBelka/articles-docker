<?php

namespace Classes\Models;

use \Illuminate\Database\Eloquent\Model;

abstract class Author extends Model
{
/*    protected $id;
    protected $name;
    protected $lastname;*/
    protected $table = "authors";
    protected $fillable = array("name", "lastname");

    public function articles() {
        return $this->hasMany('Classes\Models\Article');
    }
    /*public function __construct()
    {
        parent::__construct();
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : int
    {
        $this->id = $id;
    }


    public function setName(string $name) : string
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setLastName(string $lastname) : string
    {
        $this->lastname = $lastname;
    }

    public function getLastName() : string
    {
        return $this->lastname;
    }
    */
    abstract public function count(array $filter) : int;

}