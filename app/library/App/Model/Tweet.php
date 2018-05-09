<?php

namespace App\Model;

use Phalcon\Mvc\Collection;

class Tweet extends Collection {

    public function getSource()
    {
        return "tweets";
    }

}