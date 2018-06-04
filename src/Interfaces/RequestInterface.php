<?php

namespace Snayper911_Http\Interfaces;

use Snayper911_Http\RequestFactory;



interface RequestInterface
{

	/**
  	* Конструктор встановлює RequestFactory об'єкт
  	*
  	* @param RequestFactory $request
  	*
  	* @return void
  	*/
	public function __construct(RequestFactory $request);


	/**
  	* Метод повертає значення массиву Attribute по назві
  	*
  	* @param String $name
  	* @throws NotParamsException
  	*
  	* @return String
  	*/
	public function getAttribute(String $name): String;


	/**
  	* Метод встановлює в массив Attribute значення, якщо його ще немає
  	*
  	* @param String $name
  	* @param String $value
  	*
  	* @return void
  	*/
	public function setAttribute(String $name, String $value): void;


	/**
  	* Метод повертає значення массиву $_GET по назві
  	*
  	* @param String $name
  	* @throws NotParamsException
  	*
  	* @return String
  	*/
	public function getGet(String $name): String;


	/**
  	* Метод повертає весь массив $_GET
  	*
  	* @return array
  	*/
	public function getAllGet(): array;


	/**
  	* Метод повертає значення массиву $_POST по назві
  	*
  	* @param String $name
  	* @throws NotParamsException
  	*
  	* @return String
  	*/
	public function getPost(String $name): String;


	/**
  	* Метод повертає весь массив $_POST
  	*
  	* @return array
  	*/
	public function getAllPost(): array;


	/**
  	* Метод повертає значення массиву $_FILES по назві
  	*
  	* @param String $name
  	* @throws NotParamsException
  	*
  	* @return array
  	*/
	public function getFiles(String $name): array;


	/**
  	* Метод повертає весь массив $_FILES
  	*
  	* @return array
  	*/
	public function getAllFiles(): array;


	/**
  	* Метод повертає значення массиву $_SESSION по назві
  	*
  	* @param String $name
  	* @throws NotParamsException
  	*
  	* @return String
  	*/
	public function getSession(String $name): String;


	/**
  	* Метод повертає весь массив $_SESSION
  	*
  	* @return array
  	*/
	public function getAllSession(): array;


	/**
  	* Метод повертає значення массиву $_COOKIE по назві
  	*
  	* @param String $name
  	* @throws NotParamsException
  	*
  	* @return String
  	*/
	public function getCookie(String $name): String;


	/**
  	* Метод повертає весь массив $_COOKIE
  	*
  	* @return array
  	*/
	public function getAllCookie(): array;


	/**
  	* Метод повертає весь массив $_SERVER
  	*
  	* @return array
  	*/
	public function getAllServer(): array;


}


