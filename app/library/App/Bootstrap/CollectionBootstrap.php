<?php

namespace App\Bootstrap;

use App\BootstrapInterface;
use Phalcon\Config;
use Phalcon\DiInterface;
use PhalconRest\Api;

use App\Collections\ExportCollection;
use App\Resources\UserResource;
use App\Resources\TweetResource;

class CollectionBootstrap implements BootstrapInterface
{
    public function run(Api $api, DiInterface $di, Config $config)
    {
        $api
            ->collection(new ExportCollection('/export'))
            ->resource(new UserResource('/users'))
            ->resource(new TweetResource('/tweets'))
        ;
    }
}
