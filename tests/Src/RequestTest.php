<?php

namespace Tests\Src;

use PHPUnit\Framework\TestCase;
use Snayper911_Http\Request;
use Snayper911_Http\RequestFactory;
use Snayper911_Http\Exception\NotParamsException;


class RequestTest extends TestCase
{


    //ATTRIBUTE
    /**
    * Тест перевіряє правильність встановлення атрибутів
    *
    * @return void
    */
    public function testGetAttribute(): void
    {
        $attributeName = 'id';
        $attributeValue = 12;

        $request_params = new RequestFactory();
        $request = new Request($request_params);
        $request->setAttribute($attributeName, $attributeValue);

        self::assertEquals($attributeValue, $request->getAttribute($attributeName));
    }
    
    /**
    * Тест перевіряє введення неіснуючого параметра attribute з об'єкта Request
    *
    * @expectedException Snayper911_Http\Exception\NotParamsException
    * @expectedExceptionMessage Немає даного атрибута !
    *
    * @return void
    */
    public function testErrorParamAttribute(): void
    {
        $request_params = new RequestFactory();
        $request = new Request($request_params);
        $request->getAttribute('id');
    }




  
    //GET
    /**
    * Тест перевіряє правильність повернення get параметра з об'єкта Request
    *
    * @return void
    */
    public function testGetGet(): void
    {
        $_GET = $arr = ['id' => 2];
        $request_params = new RequestFactory();
        $request = new Request($request_params);

        self::assertEquals($arr['id'], $request->getGet('id'));
    }

    /**
    * Тест перевіряє правильність повернення чи метод являється GET
    *
    * @return void
    */
    public function testIsGet(): void
    {
        $_POST = $arr = ['id' => 2];
        $request_params = new RequestFactory();
        $request_params->server['REQUEST_METHOD'] = 'GET'; //Встановлюємо вручну метод маршруту
        $request = new Request($request_params);
        
        self::assertTrue($request->isGet());
    }


    /**
    * Тест перевіряє введення неіснуючого параметра get з об'єкта Request
    *
    * @expectedException Snayper911_Http\Exception\NotParamsException
    * @expectedExceptionMessage Немає даного get параметра !
    *
    * @return void
    */
    public function testErrorParamGet(): void
    {
        $_GET = [];
        $request_params = new RequestFactory();
        $request = new Request($request_params);
        $request->getGet('id');
    }

    /**
    * Тест перевіряє правильність повернення всіх get параметрів з об'єкта Request
    *
    * @return void
    */
    public function testGetAllGet(): void
    {
        $_GET = $arr = ['id' => 2, 'name' => 'Page 1'];
        $request_params = new RequestFactory();
        $request = new Request($request_params);

        self::assertEquals($arr, $request->getAllGet());
    }


    //POST
    /**
    * Тест перевіряє правильність повернення post параметра з об'єкта Request
    *
    * @return void
    */
    public function testGetPost(): void
    {
        $_POST = $arr = ['id' => 2];
        $request_params = new RequestFactory();
        $request = new Request($request_params);

        self::assertEquals($arr['id'], $request->getPost('id'));
    }

    /**
    * Тест перевіряє правильність повернення чи метод являється POST
    *
    * @return void
    */
    public function testIsPost(): void
    {
        $_POST = $arr = ['id' => 2];
        $request_params = new RequestFactory();
        $request_params->server['REQUEST_METHOD'] = 'POST'; //Встановлюємо вручну метод маршруту
        $request = new Request($request_params);

        self::assertTrue($request->isPost());
    }

    /**
    * Тест перевіряє введення неіснуючого параметра post з об'єкта Request
    *
    * @expectedException Snayper911_Http\Exception\NotParamsException
    * @expectedExceptionMessage Немає даного post параметра !
    *
    * @return void
    */
    public function testErrorParamPost(): void
    {
        $_POST = [];
        $request_params = new RequestFactory();
        $request = new Request($request_params);
        $request->getPost('id');
    }

    /**
    * Тест перевіряє правильність повернення всіх post параметрів з об'єкта Request
    *
    * @return void
    */
    public function testGetAllPost(): void
    {
        $_POST = $arr = ['id' => 2, 'name' => 'Page 1'];
        $request_params = new RequestFactory();
        $request = new Request($request_params);

        self::assertEquals($arr, $request->getAllPost());
    }


    //FILES
    /**
    * Тест перевіряє правильність повернення files параметра з об'єкта Request
    *
    * @return void
    */
    public function testGetFiles(): void
    {
        $_FILES = $arr = ['files' => 
                [
                  'name' => '16.07.2017_small.jpg',
                  'type' => 'image/jpeg',
                  'tmp_name' => 'C:\OSPanel\userdata\temp\php4BA8.tmp',
                  'error' => 0,
                  'size' => 55677
                ]
        ];
        $request_params = new RequestFactory();
        $request = new Request($request_params);
        self::assertEquals($arr['files']['name'], $request->getFiles('files')['name']);
    }

    /**
    * Тест перевіряє правильність повернення всього массиву files з об'єкта Request
    *
    * @return void
    */
    public function testGetAllFiles(): void
    { 
        $_FILES = $arr = ['files' => 
                [
                  'name' => '16.07.2017_small.jpg',
                  'type' => 'image/jpeg',
                  'tmp_name' => 'C:\OSPanel\userdata\temp\php4BA8.tmp',
                  'error' => 0,
                  'size' => 55677
                ],
                'photos' => 
                [
                  'name' => '16.07.2017_small2.jpg',
                  'type' => 'image/jpeg',
                  'tmp_name' => 'C:\OSPanel\userdata\temp\php4BG8.tmp',
                  'error' => 0,
                  'size' => 53677
                ]
        ];
        $request_params = new RequestFactory();
        $request = new Request($request_params);
        self::assertEquals($arr, $request->getAllFiles());
    }


    //SESSION
    /**
    * Тест перевіряє правильність повернення session параметра з об'єкта Request
    *
    * @return void
    */
    public function testGetSession(): void
    {
        $_SESSION['name'] = $name = "Taras";
        $request_params = new RequestFactory();
        $request = new Request($request_params);
        self::assertEquals($name, $request->getSession('name'));
    }

    /**
    * Тест перевіряє правильність повернення всіх session параметрів з об'єкта Request
    *
    * @return void
    */
    public function testGetAllSession(): void
    {
        $_SESSION['name'] = "Taras";
        $_SESSION['name_woomen'] = "Galya";
        $arr = ['name' => 'Taras', 'name_woomen' => 'Galya'];
        $request_params = new RequestFactory();
        $request = new Request($request_params);
        self::assertEquals($arr, $request->getAllSession());
    }


    //COOKIE
    /**
    * Тест перевіряє правильність повернення cookie параметра з об'єкта Request
    *
    * @return void
    */
    public function testGetCookie(): void
    {
        $name = "Taras";
        $_COOKIE['name'] = $name;
        $request_params = new RequestFactory();
        $request = new Request($request_params);
        self::assertEquals($name, $request->getCookie('name'));
    }

    /**
    * Тест перевіряє правильність повернення всіх cookie параметрів з об'єкта Request
    *
    * @return void
    */
    public function testGetAllCookie(): void
    {
        $name = "Taras";
        $name_woomen = "Galya";
        $_COOKIE['name'] = $name;
        $_COOKIE['name_woomen'] = $name_woomen;
        $arr = ['name' => 'Taras', 'name_woomen' => 'Galya'];
        $request_params = new RequestFactory();
        $request = new Request($request_params);
        self::assertEquals($arr, $request->getAllCookie());
    }


    //SERVER
    

    /**
    * Тест перевіряє правильність повернення всіх server параметрів з об'єкта Request
    *
    * @return void
    */
    public function testGetAllServer(): void
    {
        $request_params = new RequestFactory();
        $request = new Request($request_params);
        self::assertTrue(is_array($request->getAllServer()));
    }





}