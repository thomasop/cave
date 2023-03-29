<?php

namespace App\controller;

use App\tool\PHPSession;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class controller
{
    protected $twig;
    private $loader;
    
    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader('Views/');
        $this->twig = new \Twig\Environment($this->loader, [
            'debug' => true,
        ]);
        $php_session = new PHPSession();
        $this->twig->addGlobal('_flash', $php_session);
    }
    
    public function getTwig()
    {
        return $this->twig;
    }
    
    public function phpSession(){
        $php_session = new PHPSession();
        return $php_session;
    }
}
