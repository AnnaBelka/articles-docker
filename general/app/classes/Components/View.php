<?php

namespace Classes\Components;


use Twig_Loader_Filesystem;
use Twig_Environment;

class View
{
    public $twig;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem( realpath(__DIR__ .'../../storage/twig'));
        $this->twig = new Twig_Environment($loader, array(
            'cache' =>  realpath(__DIR__ .'../../storage/twig'),
        ));

        return $this->twig;
    }
}