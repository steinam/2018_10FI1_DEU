<?php

use PDO;

$pdo = new PDO(
    'mysql:host=127.0.0.1;dbname=bookstore',
    'bookstore',
    '3XGe7LJodVu8pwC7'
);

/*
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=bookstore',
    'bookstore',
    'G5TbeoUtFoOB7T3w'
);

*/
$res = $pdo->query("Select * from `book`");

foreach($res As $row){
    var_dump($row);

}