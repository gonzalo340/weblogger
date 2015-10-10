<?php
class Weblogger {
	private $__ip_client = null;
	private $__user_agent = null;
	private $__date = null;
	private $__method = null;
	private $__filename = null;
	private $__query = null;
	private $__postdata = null;
	private $__ip_server = null;
	private $__domain = null;
	private $__request = null;
	private $__port = null;
	private $__cookies = null;
	
	public function Weblogger(){
		$this->__register();
	}
	
	private function __register(){
		$this->__ip_client	= (isset($_SERVER['REMOTE_ADDR']))?$_SERVER['REMOTE_ADDR']:'';
		$this->__user_agent	= (isset($_SERVER['HTTP_USER_AGENT']))?$_SERVER['HTTP_USER_AGENT']:'';
		$this->__date		= (isset($_SERVER['REQUEST_TIME']))?$_SERVER['REQUEST_TIME']:'';
		$this->__method		= (isset($_SERVER['REQUEST_METHOD']))?$_SERVER['REQUEST_METHOD']:'';
		$this->__query		= (isset($_GET))?$_GET:'';
		$this->__postdata	= (isset($_POST))?urlencode(json_encode($_POST)):'';
		$this->__ip_server	= (isset($_SERVER['SERVER_ADDR']))?$_SERVER['SERVER_ADDR']:'';
		$this->__domain		= (isset($_SERVER['HTTP_HOST']))?$_SERVER['HTTP_HOST']:'';
		$this->__request	= (isset($_SERVER['REQUEST_URI']))?$_SERVER['REQUEST_URI']:'';
		$this->__port		= (isset($_SERVER['SERVER_PORT']))?$_SERVER['SERVER_PORT']:'';
		$this->__cookies	= (isset($_COOKIE))?$_COOKIE:'';
		$this->__filename	= (isset($_SERVER['SCRIPT_FILENAME']))?$_SERVER['SCRIPT_FILENAME']:'';
	}
	
	public function getIpClient(){
		return $this->__ip_client;
	}
	
	public function getUserAgent(){
		return $this->__user_agent;
	}
	
	public function getDate(){
		return $this->__date;
	}
	
	public function getMethod(){
		return $this->__method;
	}
	
	public function getQuery(){
		return $this->__query;
	}
	
	public function getPostdata(){
		return json_decode(urldecode($this->__postdata));
	}
	
	public function getIpServer(){
		return $this->__ip_server;
	}
	
	public function getDomain(){
		return $this->__domain;
	}
	
	public function getRequest(){
		return $this->__request;
	}
	
	public function getPort(){
		return $this->__port;
	}
	
	public function getCookies(){
		return $this->__cookies;
	}
	
	public function getFilename(){
		return $this->__filename;
	}
}
