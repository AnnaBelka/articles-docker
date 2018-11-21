<?php

namespace Classes\Controllers;

use Rakit\Validation\Validator;
use Classes\Models\ArticleModel;
use Classes\Models\AuthorModel;

class ArticleController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getArticles()
    {

    }
    public function getArticle($id)
    {
        $validator = new Validator;
        $validation = $validator->validate($_GET, [
            'id' => 'required|numeric'
        ]);
        var_dump($id);
        var_dump($validation->fails());
        if ($validation->fails()) {
            $errors = $validation->errors();
            return $errors;
//            header("http/1.1 404 not found");
        } else {

            $article = new ArticleModel();
            var_dump($article);
            return $id;
        }


    }
}