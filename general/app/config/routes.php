<?php
return [
        'index'                         => '\Controllers\ArticleController@getArticles',
        'page-([0-9]+)'                 => '\Controllers\ArticleController@getArticles@$1',
        'articles/([0-9]+)'             => '\Controllers\ArticleController@getArticle@$1',
        'admin/articles'                => '\Controllers\AdminArticleController@getArticles',
        'admin/articles/edit/([0-9]+)'  => '\Controllers\AdminArticleController@updateArticle@$1',
        'admin/articles/delete/([0-9]+)'=> '\Controllers\AdminArticleController@deleteArticle@$1',
        'admin/articles/create'         => '\Controllers\AdminArticleController@createArticle',
        'create-data-base'              => '\Components\GenerationDump@index',
];