<?php

namespace Classes\Models;

use Classes\Components\DataBase;

class Model
{
    /*public $db;

    public function __construct(){
        $this->db = DataBase::connect();
    }*/

    public function create(){}

    public function readByFilter(array $filter) : array {}

    public function read(int $id){}

    public function edit(){}

    public function delete(){}

    public function __destruct()
    {
        $this->db = null;
    }

}