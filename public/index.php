<?php

if (!defined('_DEBUG_')) { define('_DEBUG_', false); }

use Phalcon\Http\Request;

try {
    
    require __DIR__.'/../vendor/autoload.php';
    $kernel = new AppKernel();
    
    // Start application
    $request = new Request();
    $response = $kernel->handle($request);
    
} catch (\Exception $e) {
    
    // Handle exceptions
    $di = $kernel->app && $kernel->app->di ? $kernel->app->di : new PhalconRest\Di\FactoryDefault();
    
    $response = $di->getShared(App\Constants\Services::RESPONSE);
    if(!$response || ! $response instanceof PhalconApi\Http\Response){
        $response = new PhalconApi\Http\Response();
    }
    
    $response->setErrorContent($e, _DEBUG_);
    
} finally {
    $response->send();
}