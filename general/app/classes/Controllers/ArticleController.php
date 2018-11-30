<?php

namespace Classes\Controllers;

use Classes\Services\ArticleService;
use Classes\Services\AuthorService;
use Classes\Services\TopicService;
use Rakit\Validation\Validator;


class ArticleController extends Controller
{
    private $article;
    private $author;
    private $topic;
    private $itemsPerPage = 20;
    public  $twig;

    public function __construct()
    {
        parent::__construct();

        $this->article = new ArticleService();
        $this->author = new AuthorService();
        $this->topic = new TopicService();

    }

    public function getArticles(int $currentPage = 1)
    {
        $currentPage = ($currentPage <= 0) ? 1 : $currentPage;
        $filter = [
            'currentPage' => $currentPage,
            'itemsPerPage' => $this->itemsPerPage,
        ];
        $articles = $this->article->getAllArticle($filter);

        $tagsAuthors = $this->author->getAllAuthorsOrderBy('lastname', 'ASC');
        $countArticles = $this->article->getCountArticlesId('count','DESC');
        $tagsTopics = $this->topic->getAllSortByCountArticles($countArticles);
        $tagsdateArticles = $this->article->getDateArticles();
//        var_dump($authors);

        return  $this->twig->render('layots/index.html', array(
            'articles' => $articles,
            'tagsAuthors' => $tagsAuthors,
            'tagsTopics' => $tagsTopics,
            'tagsdateArticles' => $tagsdateArticles
            )
        );
    }
    public function getArticle(int $id)
    {
        /*$validator = new Validator;
        $validation = $validator->validate($_GET, [
            'id' => 'required|numeric'
        ]);*/
//        var_dump($id);
//        $count = $this->article->count();
        $article = $this->article->getArticleById($id);

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