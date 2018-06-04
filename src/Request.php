<?php

namespace Snayper911_Http;

use Snayper911_Http\Exception\NotParamsException;
use Snayper911_Http\RequestFactory;
use Snayper911_Http\Interfaces\RequestInterface;



class Request implements RequestInterface
{
	//RequestFactory об'єкт
	private $request;

	//Массив атрибутів
	private $attribute = [];



	/**
  	* Конструктор встановлює RequestFactory об'єкт
  	*
  	* @param RequestFactory $request
  	*
  	* @return void
  	*/
	public function __construct(RequestFactory $request)
	{
		$this->request = $request;
	}


	//ATTRIBUTE
	/**
  	* Метод повертає значення массиву Attribute по назві
  	*
  	* @param String $name
  	* @throws NotParamsException
  	*
  	* @return String
  	*/
	public function getAttribute(String $name): String
	{
		if (isset($this->attribute[$name])) {
			return $this->attribute[$name];
		};
		throw new NotParamsException('Немає даного атрибута !');
	}

	/**
  	* Метод встановлює в массив Attribute значення, якщо його ще немає
  	*
  	* @param String $name
  	* @param String $value
  	*
  	* @return void
  	*/
	public function setAttribute(String $name, String $value): void
	{
		if (!isset($this->attribute[$name])) {
			$this->attribute[$name] = $value;
		}
	}


	//GET
	/**
  	* Метод повертає значення массиву $_GET по назві
  	*
  	* @param String $name
  	* @throws NotParamsException
  	*
  	* @return String
  	*/
	public function getGet(String $name): String
	{
		if (isset($this->request->get[$name])) {
			return $this->request->get[$name];
		};
		throw new NotParamsException('Немає даного get параметра !');
	}

	/**
  	* Метод визначає чи діє метод GET
  	*
  	* @return bool
  	*/
	public function isGet(): bool
	{
		return ($this->getAllServer()['REQUEST_METHOD'] == 'GET') ? true : false;
	}

	/**
  	* Метод повертає весь массив $_GET
  	*
  	* @return array
  	*/
	public function getAllGet(): array
	{
		return (count($this->request->get) > 0) ? $this->request->get : [];
	}

	//POST
	/**
  	* Метод повертає значення массиву $_POST по назві
  	*
  	* @param String $name
  	* @throws NotParamsException
  	*
  	* @return String
  	*/
	public function getPost(String $name): String
	{
		if (isset($this->request->post[$name])) {
			return $this->request->post[$name];
		};
		throw new NotParamsException('Немає даного post параметра !');
	}

	/**
  	* Метод повертає весь массив $_POST
  	*
  	* @return array
  	*/
	public function getAllPost(): array
	{
		return (count($this->request->post) > 0) ? $this->request->post : [];
	}

	/**
  	* Метод визначає чи діє метод POST
  	*
  	* @return bool
  	*/
	public function isPost(): bool
	{
		return ($this->getAllServer()['REQUEST_METHOD'] == 'POST') ? true : false;
	}



	//FILES
	/**
  	* Метод повертає значення массиву $_FILES по назві
  	*
  	* @param String $name
  	* @throws NotParamsException
  	*
  	* @return array
  	*/
	public function getFiles(String $name): array
	{
		if (isset($this->request->files[$name])) {
			return $this->request->files[$name];
		};
		throw new NotParamsException('Немає даного post параметра !');
	}

	/**
  	* Метод повертає весь массив $_FILES
  	*
  	* @return array
  	*/
	public function getAllFiles(): array
	{
		return (count($this->request->files) > 0) ? $this->request->files : [];
	}


	//SESSION
	/**
  	* Метод повертає значення массиву $_SESSION по назві
  	*
  	* @param String $name
  	* @throws NotParamsException
  	*
  	* @return String
  	*/
	public function getSession(String $name): String
	{
		if (isset($this->request->session[$name])) {
			return $this->request->session[$name];
		};
		throw new NotParamsException('Немає даного session параметра !');
	}

	/**
  	* Метод повертає весь массив $_SESSION
  	*
  	* @return array
  	*/
	public function getAllSession(): array
	{
		return (count($this->request->session) > 0) ? $this->request->session : [];
	}


	//COOKIE
	/**
  	* Метод повертає значення массиву $_COOKIE по назві
  	*
  	* @param String $name
  	* @throws NotParamsException
  	*
  	* @return String
  	*/
	public function getCookie(String $name): String
	{
		if (isset($this->request->coockie[$name])) {
			return $this->request->coockie[$name];
		};
		throw new NotParamsException('Немає даного coockie параметра !');
	}

	/**
  	* Метод повертає весь массив $_COOKIE
  	*
  	* @return array
  	*/
	public function getAllCookie(): array
	{
		return (count($this->request->coockie) > 0) ? $this->request->coockie : [];
	}


	//SERVER
	/**
  	* Метод повертає весь массив $_SERVER
  	*
  	* @return array
  	*/
	public function getAllServer(): array
	{
		return (count($this->request->server) > 0) ? $this->request->server : [];
	}


	//REDIRECT
	/**
  	* Метод переспрямовує посиланням на іншу сторінку
  	*
  	* @return void
  	*/
	public function redirect(String $name): void
	{
		Header('Location:http://' . $this->getAllServer()['HTTP_HOST'] . $name);
	}


	

}