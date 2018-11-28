<?php

namespace Bookstore\Utils;

use Bookstore\Exceptions\ExceededMaxAllowedException;
use Bookstore\Exceptions\InvalidIdException;

trait Unique {
    private static $lastId = 0;
    protected $id;

    public function setId($id) {
        if ($id < 0) {
            throw new InvalidIdException('Id cannot be a negative number.');
        }
        if (empty($id)) {
            $this->id = ++self::$lastId;
        } else {
            $this->id = $id;
            if ($id > self::$lastId) {
                self::$lastId = $id;
            }
        }
        if ($this->id > 50) {
            throw new ExceededMaxAllowedException('Max number of users is 50.');
        }
    }

    public static function getLastId() {
        return self::$lastId;
    }

    public function getId() {
        return $this->id;
    }
}