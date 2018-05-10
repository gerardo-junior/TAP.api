<?php

namespace App\Model;

use \Phalcon\Mvc\MongoCollection as Collection;

class Tweet extends Collection {

    public $text;
    public $entities;
    public $media;
    public $user;
    public $metadata;
    public $status;

    public function getSource()
    {
        return "tweets";
    }

}