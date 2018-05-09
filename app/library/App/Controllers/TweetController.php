<?php

namespace App\Controllers;

use App\Model\Tweet;

use PhalconRest\Mvc\Controllers\ResourceController;

class TweetController extends ResourceController
{

    public function all()
    {  
        $response = Tweet::findFirst();
        return $this->createArrayResponse($response, 'data');
    }

    public function index()
    {
        $tweet = Tweet::find();

        die(var_dump($tweet));
    }
}