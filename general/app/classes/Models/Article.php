<?php

namespace Classes\Models;


use Classes\Components\Paginator;
use PDO;

class Article extends ArticleModel
{

    protected $table = '`articles`';


    /*public function __construct()
    {
        parent::__construct();
    }*/


    public function create()
    {

    }

    public function readByFilter(array $filter) :array
    {
        /*$articles = array();
        $currentPage = $filter['currentPage'];
        $itemsPerPage = $filter['itemsPerPage'];

        $totalItems = Paginator::getTotalItems($this->table, $this->db);
        $totalPage = Paginator::getTotalPage($totalItems, $itemsPerPage);

        $currentPage = Paginator::getCurrentPage($currentPage, $totalPage);
        $start = Paginator::getStartPage($currentPage, $itemsPerPage);

        $articles['currentPage'] = $currentPage;
        $articles['startItems'] = $start;
        $articles['itemsPerPage'] = $itemsPerPage;
        $articles['totalItems'] = $totalItems;
        $articles['totalPage'] = $totalPage;

        $statement = $this->db->prepare("SELECT * FROM $this->table LIMIT ?, ?");
        $statement->bindValue(1, $start, PDO::PARAM_INT);
        $statement->bindValue(2, $itemsPerPage, PDO::PARAM_INT);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $articles = $statement->fetchAll();

        return $articles;*/
    }

    public function read(int $id) : Article
    {

        /*$statement = $this->db->prepare("SELECT * FROM $this->table WHERE id = :id LIMIT 1");
        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $statement->execute([
            ':id' => $id
        ]);
        $article = $statement->fetch();
var_dump($article);
        return $article;*/

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