<?php

namespace Snayper911_Http;

use Snayper911_Http\Response;



class ResponseHtml extends Response
{
	 
    /**
    * Конструктор встановлює зміст та код відповіді
    *
    * @param String $body
    * @param Int $statusCode
    *
    * @return void
    */
    public function __construct($body, $statusCode = 200)
    {
      $this->body = $body;
      $this->statusCode = $statusCode;
    }


    /**
    * Метод повертає зміст відповіді $body
    *
    * @return String
    */
    public function getBody(): String
    {
        return $this->body;
    }


    /**
    * Метод емітить і виводить дані 
    *
    * @return 
    */
    public function emit()
    {
        $this->initAppHeader();
        echo $this->getBody();
    }
	
}