<?php
  use Bookstore\Domain\Book;
  use Bookstore\Domain\Customer;
  //use Library\Domain2\Book as ld;

 function __autoload($classname) {
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/', $classname);
    $filename = __DIR__ .'/src/' . $directory . '.php';
    require_once($filename);
 }


 function autoloader($classname) {
  $lastSlash = strpos($classname, '\\')+1;
  $classname = substr($classname, $lastSlash);
  $directory = str_replace('\\', '/', $classname);
  $filename = __DIR__ .'/src/' . $directory . '.php';
  require_once($filename);
}

spl_autoload_register('autoloader');


 $book1 = new Book(9785267006323,"1984", "George Orwell",  12);
 $customer1 = new Customer(5, 'John', 'Doe', 'johndoe@mail.com');




 //    var_dump($book1);
 var_dump($customer1);   


//$bookld = new ld(9785267006323,"1984", "George Orwell",  12);

//var_dump($bookld);
