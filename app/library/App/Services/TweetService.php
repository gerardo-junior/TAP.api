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

        $tweets =  json_decode($twitter->setGetfield($getfield)
                                       ->buildOauth($url, $requestMethod)
                                       ->performRequest());

        $data = [];

        foreach($tweets->statuses as $tweetItem) {

            if(!Tweet::findFirst([['tweetId' =>  $tweetItem->id]])) {
                $tweet = new Tweet();
                $tweet->tweetId = $tweetItem->id;
                $tweet->text = $tweetItem->text;

                if (isset($tweetItem->extended_entities) && isset($tweetItem->extended_entities->media)) {
                    $tweet->media = $tweetItem->extended_entities->media;
                }
                
                $tweet->user = $tweetItem->user;
                $tweet->metadata = $tweetItem->metadata;
                $tweet->entities = $tweetItem->entities;
                $tweet->entities = $tweetItem->entities;
                $tweet->status = array(
                                       'retweet' => $tweetItem->retweet_count,
                                       'favorite' => $tweetItem->favorite_count
                                      );

                if (!is_null($tweet->text)) {
                    $tweet->save();
                }    
                $data[] =  $tweet;
            }
            
            unset($tweet);
        }
        unset($tweets);

        return $data;
    }
}
    