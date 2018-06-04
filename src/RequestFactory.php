<?php

namespace Snayper911_Http;

use Snayper911_Http\Exception\NotParamsException;


class RequestFactory
{

	//Массив $_GET
	public $get;

	//Массив $_POST
	public $post;

	//Массив $_FILES
	public $files;

	//Массив $_SESSION
	public $session;

	//Массив $_COOKIE
	public $coockie;

	//Массив $_SERVER
	public $server;


	/**
  	* Конструктор встановлює глобальні массиви $_GET, $_POST, $_FILES, $_SESSION, $_COOKIE, $_SERVER
  	*
  	* @return $this
  	*/
	public function __construct()
	{
		$this->get = $_GET;
		$this->post = $_POST;
		$this->files = $_FILES;
		$this->session = $_SESSION;
		$this->coockie = $_COOKIE;
		$this->server = $_SERVER;
		return $this;
	}
	

}