<?php
namespace Bookstore\Domain;
class Customer {

    private static $lastId = 0;

    private $id;
    private $name;
    private $surname;
    private $email;

    public function __construct( $id, string $name, string $surname, string $email ) {
        if ($id == null) {
            $this->id = ++self::$lastId;
        }
        else {
            $this->id = $id;
            if ($id > self::$lastId){
                self::$lastId = $id;
            }
        }
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
    }


    public static function getLastId(): int {
        return self::$lastId;
    }


  

    public function getFirstname(): string {
        return $this->firstname;
    }

    public function getSurname(): string {
        return $this->surname;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = $email; } 
}