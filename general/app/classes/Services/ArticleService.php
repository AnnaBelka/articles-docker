<?php

namespace Classes\Services;


use Classes\Models\Article;

class ArticleService extends Article
{


    public function create()
    {

    }

    public function getAllArticle() :Object
    {
        $articles = Article::select('id', 'title', 'image', 'description', 'count_views')->paginate(20);
        return $articles;
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

    public function getArticleById(int $id) : Article
    {
        $article = Article::where('id', $id)->first();
        return $article;

    }

    public function getCountArticlesId(string $column, string $directionBy) :array
    {
        $articles = Article::selectRaw('topic_id, count(id) as count')->groupBy('topic_id')->orderBy($column, $directionBy)->get()->toArray();
        return $articles;
    }

    public function getDateArticles() :array
    {
       $datesArticles = Article::select("publish_date")->groupBy("publish_date")
            ->get("publish_date")
            ;
        /*print_r($datesArticles);*/
        return $datesArticles;
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