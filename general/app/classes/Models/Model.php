<?php

namespace Classes\Models;

class Model
{

    protected $table;
    protected $fillable;

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