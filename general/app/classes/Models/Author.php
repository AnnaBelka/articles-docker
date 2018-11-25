<?php

namespace Classes\Models;


//use PDO;

class Author extends AuthorModel
{
    private $table = '`authors`';

    /*public function __construct()
    {
        parent::__construct();
    }*/

    public function create()
    {

    }

    public function readByFilter(array $filter) :array
    {

        /*$orderBy = $filter['sort'];
        $statement = $this->db->prepare("SELECT * FROM $this->table ORDER BY ?");
        $statement->execute([$orderBy]);
        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $authors = $statement->fetchAll();
var_dump($authors);
        return $authors;*/
    }

    public function read(int $id) :int
    {

    }

    public function edit()
    {

    }

    public function delete()
    {

    }


    public function count(array $filter = array()) : int
    {
        /*$column = $this->db->query("SELECT count(`id`) FROM $this->table");
        return $column->fetchColumn();*/
    }
}