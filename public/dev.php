<?php


if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !(in_array(@$_SERVER['REMOTE_ADDR'], array_filter(array_unique(array_merge(['127.0.0.1',
                                                                                  '::1',
                                                                                  exec("ip route show | awk '/default/ {print $3}'")],
                                                                                  (array) gethostbynamel('localhost'), 
                                                                                  (array) gethostbynamel('host'), 
                                                                                  (array) gethostbynamel('host.docker.internal'), 
                                                                                  (array) gethostbynamel('docker.for.win.localhost'), 
                                                                                  (array) gethostbynamel('docker.for.mac.localhost')))), true) || PHP_SAPI === 'cli-server')
) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

define('_DEBUG_', true);
ini_set('display_errors', "On");
error_reporting(E_ALL);
$debug = new Phalcon\Debug();
$debug->listen();

require_once __DIR__.'/index.php';