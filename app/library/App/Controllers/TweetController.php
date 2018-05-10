<?php

namespace App\Controllers;

use PhalconRest\Mvc\Controllers\ResourceController;
use App\Constants\Services;
use Phalcon\Di;
use App\Model\Tweet;

class TweetController extends ResourceController
{
    public function serach()
    {  
        $getfield = $this->di->get('request')->get('q');
        $tweetService = $this->di->get(Services::TWEETSERVICE);
        $response = $tweetService->getAndSaveLasts($getfield);
        return $this->createArrayResponse($response, 'data');
    }

    public function index()
    {
        $tweet = Tweet::find();

        die(var_dump($tweet));
    }
}