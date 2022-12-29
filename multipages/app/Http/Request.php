<?php

namespace App\Http;

class Request{

    /**
     * HTTP request method
     * @var string
     */
    private $httpMethod;

    /**
     * URI of page
     * @var string
     */
    private $uri;
    
    /**
     * Parameters URL
     * @var array
     */
    private $queryParams = [];

    /**
     * POST variables
     * @var array
     */
    private $postVars = [];
    
    /**
     * Request header
     * @var array
     */
    private $headers = [];

    /**
     * Class constructor
     */
    public function __construct(){
        $this->queryParams   = $_GET ?? [];
        $this->postVars     = $_POST?? [];
        $this->headers      = getallheaders();
        $this->httpMethod   = $_SERVER['REQUEST_METHOD'] ?? [];
        $this->uri          = $_SERVER['REQUEST_URI'] ?? [];
    }

    /**
     * Returning the HTTP method of request
     * @return string
     */
    public function getHttpMethod(){
        return $this->httpMethod;
    }

    /**
     * Returning the URI of request
     * @return string
     */
    public function getUri(){
        return $this->uri;
    }

    /**
     * Returning the Headers of request
     * @return array
     */
    public function getHeaders(){
        return $this->headers;
    }

    /**
     * Returning the query params of request
     * @return array
     */
    public function getQueryParams(){
        return $this->queryParams;
    }
        
    /**
     * Returning the post vars of request
     * @return array
     */
    public function getPostVars(){
        return $this->postVars;
    }
}