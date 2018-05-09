<?php

namespace App\Model;

use \Phalcon\Mvc\MongoCollection as Collection;

class Tweet extends Collection {

    public $tweet;
    public $image;
    public $user;

    public function getSource()
    {
        return "tweets";
    }

}