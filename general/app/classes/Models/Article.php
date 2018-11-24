<?php

namespace Classes\Models;

use Classes\Components\DataBase;
use Classes\Components\Paginator;
use PDO;

class Article extends ArticleModel implements Model
{

    protected $table = '`articles`';
    protected $db;


    public function __construct()
    {
        $this->db = DataBase::connect();
    }


    public function create()
    {

    }

    public function readByFilter(array $filter) :array
    {
        $articles = array();
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

        while($row = $statement->fetch()) {
            $article = new Article();
            $article->id = $row->getId();
            $article->title = $row->getTitle();
            $article->author_id = $row->getAuthorId();
            $article->topic_id = $row->getTopicId();
            $article->description = $row->getDescription();
            $article->image = $row->getImage();
            $article->created_at = $row->getCreatedAt();
            $article->count_views = $row->getCountViews();
            $articles[$article->id] = $article;
        }

        return $articles;
    }

    public function read(int $id) : Article
    {
        $article = new Article();
        $statement = $this->db->prepare("SELECT * FROM $this->table WHERE id = :id LIMIT 1");
        $statement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $statement->execute([
            ':id' => $id
        ]);

        while($row = $statement->fetch()) {
            $article->id = $row->getId();
            $article->title = $row->getTitle();
            $article->author_id = $row->getAuthorId();
            $article->topic_id = $row->getTopicId();
            $article->description = $row->getDescription();
            $article->image = $row->getImage();
            $article->created_at = $row->getCreatedAt();
            $article->count_views = $row->getCountViews();
        }
        return $article;

    }

    public function edit()
    {

    }

    public function delete()
    {

    }

    public function count(array $filter = array()) : int
    {
        $column = $this->db->query("SELECT count(`id`) FROM $this->table");
        return $column->fetchColumn();
    }
}