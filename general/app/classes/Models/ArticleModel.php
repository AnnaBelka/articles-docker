<?php

namespace Classes\Models;


class ArticleModel extends Model
{
    private $table = '`articles`';
    private $db;

    public function __construct()
    {
        parent::__construct();
        var_dump($this->db);
    }

    public function create()
    {
//        $this->db;
    }

    public function read()
    {

    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}