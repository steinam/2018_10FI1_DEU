<?php
require_once 'functions.php';
require_once __DIR__ . '/vendor/autoload.php';

use Bookstore\Domain\Customer\CustomerFactory;
use Bookstore\Utils\Config;
use Bookstore\Domain\Book;


//use Bookstore\Domain\Customer\Basic;
//use Bookstore\Domain\Customer\Premium;

//use Bookstore\Exceptions\ExceededMaxAllowedException;
//use Bookstore\Exceptions\InvalidIdException;
//use Exception;


/*
function autoloader($classname) {
    $lastSlash = strpos($classname, '\\')+1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/', $classname);
    $filename = __DIR__.'/src/'.$directory.'.php';
    require_once($filename);
}

spl_autoload_register('autoloader');
*/

function checkIfValid(Customer $customer, array $books): bool {
    return $customer->getAmountToBorrow() >= count($books);
}


//erstes Beispiel nach Einbau autolader von composer
$book = new Book(1222, "hhhd", "ste", 12);
var_dump($book);

$config = Config::getInstance(); 
$dbConfig = $config->get('db');
var_dump($dbConfig);
