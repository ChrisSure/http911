<?php

namespace Tests\Src;

use PHPUnit\Framework\TestCase;
use Snayper911_Http\ResponseHtml;
use Snayper911_Http\ResponseJson;


class ResponseTest extends TestCase
{
  
    /**
    * Тест перевіряє правильність повернення body зміст
    *
    * @return void
    */
    public function testGetBody(): void
    {
        $response = new ResponseHtml($text = "Hello world", 200);
        self::assertEquals($text, $response->getBody());
    }

    /**
    * Тест перевіряє правильність повернення body зміст, формат json
    *
    * @return void
    */
    public function testGetBodyJson(): void
    {
        $response = new ResponseJson($text = "Hello world", 200);
        self::assertEquals(json_encode($text), $response->getBody());
    }

    /**
    * Тест перевіряє правильність повернення фрази відповіді
    *
    * @return void
    */
    public function testGetPhrases(): void
    {
        $response = new ResponseHtml("Hello world", 200);
        self::assertEquals("OK", $response->getReasonPhrase());
    }

    /**
    * Тест перевіряє правильність повернення коду відповіді
    *
    * @return void
    */
    public function testGetStatusCode(): void
    {
        $response = new ResponseHtml("Hello world", $code = 200);
        self::assertEquals($code, $response->getStatusCode());
    }



    //Headers
    /**
    * Тест перевіряє правильність функції чи існує заголовок
    *
    * @return void
    */
    public function testHasHeader(): void
    {
        $response = (new ResponseHtml("Hello world", $code = 200))->setHeader($header = "X-Developer", $value = "Taras");
        self::assertTrue($response->hasHeader($header));
    }

    /**
    * Тест перевіряє правильність повернення одного заголовку
    *
    * @return void
    */
    public function testGetHeader(): void
    {
        $response = (new ResponseHtml("Hello world", $code = 200))->setHeader($header = "X-Developer", $value = "Taras");
        self::assertEquals($value, $response->getHeader($header));
    }

    /**
    * Тест перевіряє правильність повернення всіх заголовків
    *
    * @return void
    */
    public function testGetHeaders(): void
    {
    	$arr = ["X-Developer" => "Taras", "X-Producer" => "Galya"];
        $response = (new ResponseHtml("Hello world", $code = 200))->setHeader("X-Developer", "Taras")->setHeader("X-Producer","Galya");
        self::assertEquals($arr, $response->getHeaders());
    }






}