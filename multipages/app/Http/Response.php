<?php

namespace App\Http;

class Response{

    /**
     * Status code
     * @var integer 
     */
    private $httpCode = 200;

    /**
     * Response headers
     * @var array
     */
    private $headers = [];

    /**
     * Response content type
     * @var string
     */
    private $contentType = 'text-html';

    /**
     * Response content
     * @var mixed
     */
    private $content;

    /**
     * Class constructor
     * @param integer $httpCode
     * @param mixed $content
     * @param string $contentType
     */
    public function __construct($httpCode, $content, $contentType = 'text-html'){
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->setContentType($contentType);
    }

    /**
     * Set content type of Response
     * @param string $contentType
     */
    public function setContentType($contentType){
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * Add a new register in the response header
     * @param string
     * @param string
     */
    public function addHeader($key, $value){
        $this->headers[$key] = $value;
    }
    
    /**
     * Send Response for browser
     */
    public function sendResponse(){
        //send headers
        $this->sendHeaders();
                
        //send content
        switch($this->contentType){
            case 'text-html';
            echo $this->content;
            exit;
        }
    }
    /**
     * Send headers for browser
     */
    private function sendHeaders(){
        //Set code status of response 
        http_response_code($this->httpCode);

        //send Headers
        foreach($this->headers as $key=>$value){
            header($key.': '.$value);
        }
    }
   

}