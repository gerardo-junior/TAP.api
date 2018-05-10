<?php

namespace App\Services;

use App\Constants\Services;
use Phalcon\Di;
use App\Model\Tweet;

class TweetService
{
    public function getAndSaveLasts($getfield)
    {
        $twitter = Di::getDefault()->get(Services::TWITTERAPI);

        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $requestMethod = 'GET';

        $tweets =  json_decode($twitter->setGetfield('?q='.$getfield)
                                       ->buildOauth($url, $requestMethod)
                                       ->performRequest());

        $data = [];

        foreach($tweets->statuses as $tweetItem) {

            $tweet = $this->save($tweetItem);
            
            if ($tweet) {
                $data[] =  $tweet;
            }
            
            unset($tweet);
        }
        unset($tweets);

        return $data;
    }

    public function save($tweetItem)
    {
        if (is_null($tweetItem->text)) {
            return false;
        }
        
        $tweet = Tweet::findFirst([['tweetId' =>  $tweetItem->id]]);
        
        if(!$tweet) { 
            $tweet = new Tweet();
        }
        
        $tweet->text = $tweetItem->text;
        $tweet->tweetId = $tweetItem->id;
        
        if (isset($tweetItem->extended_entities) && isset($tweetItem->extended_entities->media)) {
            $tweet->media = $tweetItem->extended_entities->media;
        }
        
        $tweet->user = $tweetItem->user;
        
        if (isset($tweetItem->metadata)) {
            $tweet->metadata = $tweetItem->metadata;
        }

        $tweet->entities = $tweetItem->entities;
        $tweet->entities = $tweetItem->entities;
        $tweet->status = array('retweet' => $tweetItem->retweet_count,
                               'favorite' => $tweetItem->favorite_count);
        
        $tweet->save();
        return $tweet;
    }

    public function getLast($limit, $offset) 
    {
        return Tweet::find();
    }
}
    