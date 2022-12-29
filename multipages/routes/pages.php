<?php

use App\controller\Pages;
use \App\Http\Response;

$obRoute->get('/', [
    function(){
        return new response(200, Pages\Home::getHome());
    }
]);

$obRoute->get('/pricing', [
    function(){
        return new response(200, Pages\Pricing::getPricing());
    }
]);

$obRoute->get('/contact', [
    function(){
        return new response(200, Pages\Contact::getContact());
    }
]);
$obRoute->get('/about', [
    function(){
        return new response(200, Pages\About::getAbout());
    }
]);
