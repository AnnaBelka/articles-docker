<?php

namespace Classes\Services;


use Classes\Models\Author;

class AuthorService extends Author
{

    public function create()
    {

    }

    public function getAllAuthorsOrderBy(string $sortBy, string $directionBy) :Object
    {
        $articles = Author::select('name', 'lastname')->orderBy($sortBy, $directionBy)->get();
        return $articles;
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

    }
}