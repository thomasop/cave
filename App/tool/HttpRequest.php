<?php

namespace App\tool;

class HttpRequest
{
    private $_url;
    private $_method;
    private $_param;
    private $_road;
		
    public function __construct($url = null, $method = null)
    {
			$this->_url = ($url === null) ? $_SERVER['REQUEST_URI'] : $url;
			$this->_method = ($method === null) ? $_SERVER['REQUEST_METHOD'] : $method;
			$this->_param = array();
    }
		
    public function getUrl(): string
    {
	    return $this->_url;	
    }
	
    public function getMethod(): string
    {
	    return $this->_method;	
    }
	
    public function setRoad(object $road): void
    {
	    $this->_road = $road;	
    }
	
    public function bindParam(): void
	{
		switch ($this->_method) {
			case "GET":
				foreach ($this->_road->getParam() as $param) {
					if (isset($_GET[$param])) {
						$this->_param[] = $_GET[$param];
						$_GET[$param] = $_SESSION['pseudo'] . $_SESSION['motdepasse'];
					}
				}

			case "POST":
				foreach ($this->_road->getParam() as $param) {
					if (isset($_POST[$param])) {
						$this->_param[] = $_POST[$param];
					}
				}
		}
	}

	public function getParam(): array
	{
		return $this->_param;	
	}
	
	public function run(): void
	{
		$this->bindParam();
		$this->_road->run($this);
	}
}