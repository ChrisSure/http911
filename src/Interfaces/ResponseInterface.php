<?php

namespace Snayper911_Http\Interfaces;

use Snayper911_Http\Response;



interface ResponseInterface
{

    /**
    * Метод повертає зміст відповіді $body
    *
    * @return String
    */
    public function getBody(): String;


    /**
    * Метод повертає код відповіді $body
    *
    * @return Int
    */
    public function getStatusCode(): Int;


    /**
    * Метод повертає фразу відповіді $body
    *
    * @return String
    */
    public function getReasonPhrase(): String;


    /**
    * Метод перевіряє чи існує даний заголовок
    *
    * @param String $name
    *
    * @return bool
    */
    public function hasHeader($name): bool;


    /**
    * Метод встановлює новий заголовок, повертає об'єкт клонованого себе
    *
    * @param String $name
    * @param $value
    *
    * @return self
    */
    public function setHeader(String $name, $value): Response;


    /**
    * Метод повертає вибраний заголовок
    *
    * @param String $name
    *
    * @return
    */
    public function getHeader(String $name);


    /**
    * Метод повертає массив заголовків
    *
    * @return array
    */
    public function getHeaders(): array;


}


