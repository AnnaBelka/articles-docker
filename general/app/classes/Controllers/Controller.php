<?php

namespace Classes\Controllers;

use Classes\Components\DataBase;
use Classes\Components\View;

class Controller
{
    public $db;
    public $twig;

    public function __construct(){
        $this->db = new DataBase();
        $this->twig = new View();
    }
}