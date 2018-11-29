<?php

namespace Classes\Services;


use Classes\Models\Topic;

class TopicService extends Topic
{

    public function create()
    {

    }

    public function getAllSortByCountArticles(array $countArticles) :array
    {

        foreach ($countArticles as $key => $countArticle) {
            $countArticles[$key]['name'] = Topic::where('id', $countArticle['topic_id'])->value('name');
        }
        return $countArticles;
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

