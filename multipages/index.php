<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
use App\View\View;

define('URL', 'http://localhost/php-mvc/multipages');

View::init([
    'URL' => URL
]);

$obRoute = new Router(URL);

include __DIR__.'/routes/pages.php';

$obRoute->run()
        ->sendResponse();