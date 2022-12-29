<?php

namespace App\Http;

use \Closure;
use Exception;

class Router{

    /**
     * URL main
     * @var string
     */
    private $url = '';

    /**
     * Prefix of the routes
     * @var string
     */
    private $prefix ='';

    /**
     * Index of routes
     * @var array
     */
    private $routes = [];

    /**
     * Intance of request
     * @var Request
     */
    private $request;

    /**
     * Class constructor
     * @param string $url
     */
    public function __construct($url)
    {
        $this->request  = new Request();
        $this->url      = $url;
        $this->setPrefix();
    }

    /**
     * Set the route prefix
     */
    private function setPrefix(){
        //get prefix of url
        $parseUrl = parse_url($this->url);        
        //set prefix 
            
        $this->prefix = $parseUrl['path'] ?? '';
    }

    /**
     * Returns the uri without the prefix
     * @return string
     */
    public function getUri(){
        //get URI for Request
        $uri = $this->request->getUri();
        //Separates the URI from the prefix 
        $explodeUri = strlen($this->prefix) ? explode($this->prefix,$uri) : [$uri];        
        //return only URI      
        return end($explodeUri);
    }

    /**
     * Return current route 
     * @return array
     */
    public function getRoute(){
        //get URI 
        $uri = $this->getUri();
        //Get Method
        $httpMethod = $this->request->getHttpMethod();    
          

        //validate route
        foreach ($this->routes as $partternRoute=>$methods) {
            //check URI
            
            if(preg_match($partternRoute, $uri)){   
                //Ckeck method
                if($methods[$httpMethod]){
                    //return parameters of route
                    return $methods[$httpMethod];
                }
                //returns error
                throw new Exception("Method not allowed", 405);
            }            
        }
        //returns error
        throw new Exception("URL not found", 404);
    }


    /**
     * Add route 
     * @param string $method
     * @param string $route
     * @param array $params
     */
    private function addRoute($method, $route, $params = []){
        
        //Parameter validation
        foreach ($params as $key => $value) {
            if($value instanceof Closure){
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }        
        
        

        //modifies route for regular expression
        $partternRoute = '/^'.str_replace('/', '\/',$route).'$/';

        //set route
        $this->routes[$partternRoute][$method] = $params;      
    }

    /**
     * Defines a get route
     * @param string route
     * @param array $params
     */
    public function get($route, $params = []){

        return $this->addRoute('GET', $route, $params);
    }
     /**
     * Defines a post route
     * @param string route
     * @param array $params
     */
    public function post($route, $params = []){

        return $this->addRoute('POST', $route, $params);
    }
     /**
     * Defines a put route
     * @param string route
     * @param array $params
     */
    public function put($route, $params = []){

        return $this->addRoute('PUT', $route, $params);
    }
     /**
     * Defines a delete route
     * @param string route
     * @param array $params
     */
    public function delete($route, $params = []){

        return $this->addRoute('DELETE', $route, $params);
    }
    
    /**
     * Execute the route currency
     * @return Response
     */
    public function run(){
        try {
            $route = $this->getRoute();
            //check controller exist
            if(!isset($route['controller'])){
                throw new Exception("Error Processing Request", 500);                
            }
            $args = [];

            //returns function execution
            return call_user_func_array($route['controller'], $args);
            
        }catch (Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }

}