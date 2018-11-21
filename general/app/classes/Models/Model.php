<?php

namespace Classes\Models;

use Classes\Components\DataBase;

abstract class Model
{
    private $table;
    private $db;

    public function __construct()
    {
        $this->db = DataBase::connect();
    }

    abstract public function create();

    abstract public function read();

    abstract public function edit();

    abstract public function delete();

}