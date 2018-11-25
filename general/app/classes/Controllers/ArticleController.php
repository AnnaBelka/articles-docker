<?php

namespace Classes\Controllers;

use Rakit\Validation\Validator;
use Classes\Models\Article;
use Classes\Models\Author;

class ArticleController extends Controller
{
    private $article;
    private $author;
    private $itemsPerPage = 20;

    public function __construct()
    {
        parent::__construct();

        $this->article = new Article();
        $this->author = new Author();

    }

    public function getArticles(int $currentPage = 1)
    {
        $currentPage = ($currentPage <= 0) ? 1 : $currentPage;
        $filter = [
            'currentPage' => $currentPage,
            'itemsPerPage' => $this->itemsPerPage,
        ];
        $articles = $this->article->readByFilter($filter);

        $authors = $this->author->readByFilter(['sort' => 'lastname ASC']);
//        var_dump($authors);

        return $articles;
    }
    public function getArticle(int $id)
    {
        /*$validator = new Validator;
        $validation = $validator->validate($_GET, [
            'id' => 'required|numeric'
        ]);*/
//        var_dump($id);
//        $count = $this->article->count();
        $article = $this->article->read($id);

        return $article;
//        var_dump($validation->fails());
        /*if ($validation->fails()) {
            $errors = $validation->errors();
            return $errors;
//            header("http/1.1 404 not found");
        } else {

            $article = new ArticleModel();
            var_dump($article);
            return $id;
        }*/


    }
}