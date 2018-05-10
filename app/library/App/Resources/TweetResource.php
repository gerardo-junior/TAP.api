<?php

namespace App\Resources;

use PhalconRest\Api\ApiResource;
use PhalconRest\Api\ApiEndpoint;
use App\Controllers\TweetController;

class TweetResource extends ApiResource {

    public function initialize()
    {
        $this
            ->name('Tweet')
            ->model(Tweet::class)
            ->expectsJsonData()
            ->handler(TweetController::class)
            ->itemKey('tweet')
            ->collectionKey('tweets')

            // ->endpoint(ApiEndpoint::all()
            //     ->description('Returns all tweets registered')
            // )
            ->endpoint(ApiEndpoint::get('/serach', 'serach'))
        ;
    }
}