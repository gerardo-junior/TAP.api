<?php

use \Phalcon\CLI\Task;
use App\Constants\Services;

class TwitterTask extends Task
{
    public function mainAction()
    {
        echo 'help';
    }

    public function tweetsAction(array $params)
    {
        $tweetService = $this->di->get(Services::TWEETSERVICE);


        switch ($params[0]) {
            case '--real-time':
            case '-f':
                $twitterSteam = $this->di->get(Services::TWITTERSTEAM);
                
                unset($params[0]);

                foreach($params as $term) {
                    $twitterSteam->whenHears($term, function(array $tweetItem) {
                        $tweet = $this->di->get(Services::TWEETSERVICE)->save((object) $tweetItem);
                        
                        if ($tweet) {
                            $this->printTweet($tweet);
                        }           
                    });
                }

                

                 $twitterSteam->startListening();
            
            case '-h':
            case '--help':
            break;
            default:
                if (is_null($params[0])) {
                    $tweets = $tweetService->getLast($limit = null, $offset = null);
                } else {
                    $tweets = $tweetService->getAndSaveLasts($params[0]);
                }
                foreach($tweets as $tweet){
                    $this->printTweet($tweet);
                    unset($tweet);
                }
                unset($tweets);

        }
    }



    private function printTweet($tweet) 
    {
        echo'===================================== ID: '. $tweet->tweetId .' =========================================' .PHP_EOL;
        echo 'User: ' . ((array) $tweet->user)['screen_name'] .', '.$tweet->status['retweet'].' retweets, '.$tweet->status['favorite'].' favorites'.PHP_EOL;
        echo $tweet->text .PHP_EOL;
        echo '------------------------------------------------------------------------------------------------------'.PHP_EOL.PHP_EOL.PHP_EOL.PHP_EOL;
    }
}