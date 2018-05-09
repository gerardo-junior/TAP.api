<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;

class TweetController extends Controller
{
    public function index()
    {
        $tweet = Tweet::find();

        die(var_dump($tweet));
    }
}