<?php

namespace Classes\Models;


use Classes\Components\DataBase;

class Author implements Model
{
    private $table = '`authors`';
    private $db;

    public function __construct()
    {
        $this->db = DataBase::connect();;
    }

    public function create()
    {

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
}