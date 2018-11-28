<?php

use Bookstore\Core\Config;
use Bookstore\Core\Router;
use Bookstore\Core\Request;

use Bookstore\Models\BookModel;
use Bookstore\Core\Db;

require_once __DIR__ . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
$twig = new Twig_Environment($loader);


//$router = new Router();




//$response = $router->route(new Request());


//echo($response);

$bookModel = new BookModel(Db::getInstance());
$book = $bookModel->get(1);
$params = ['book' => $book];
echo $twig->loadTemplate('book.twig')->render($params);
