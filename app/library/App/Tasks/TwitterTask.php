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
                $twitterSteam->whenHears($params[1], function(array $tweet) {

                    $this->printTweet($this->di->get(Services::TWEETSERVICE)->save((object) $tweet));

                })->startListening();

            break;
            default:

                $tweets = $tweetService->getLast($limit = null, $offset = null);
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
        echo 'User: ' . $tweet->user['screen_name'] .', '.$tweet->status['retweet'].' retweets, '.$tweet->status['favorite'].' favorites'.PHP_EOL;
        echo $tweet->text .PHP_EOL;
        echo '------------------------------------------------------------------------------------------------------'.PHP_EOL.PHP_EOL.PHP_EOL.PHP_EOL;
    }
}