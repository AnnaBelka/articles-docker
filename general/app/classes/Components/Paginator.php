<?php

namespace Classes\Components;

use PDO;

class Paginator
{

    static public function getTotalItems(string $table, PDO $db) :int
    {
        $column = $db->query("SELECT count(`id`) FROM $table");
        return $column->fetchColumn();
    }

    static public function getTotalPage(int $totalItems, int $itemsPerPage) :int
    {
        return ceil($totalItems / $itemsPerPage);
    }

    static public function getCurrentPage(int $currentPage, int $totalPage) :int
    {
        return ($currentPage > $totalPage) ? $totalPage : $currentPage;
    }

    static public function getStartPage(int $currentPage, int $itemsPerPage) :int
    {
        return $currentPage * $itemsPerPage - $itemsPerPage;
    }

}