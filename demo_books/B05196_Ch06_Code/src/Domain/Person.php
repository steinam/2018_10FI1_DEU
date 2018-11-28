<?php

namespace Bookstore\Domain;

use Bookstore\Utils\Unique;

class Person {
    use Unique;

    protected $firstname;
    protected $surname;
    protected $email;

    public function __construct($id, $firstname, $surname, $email) {
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        $this->setId($id);
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}