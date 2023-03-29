<?php

namespace App\tool;

use App\tool\Route;
use App\tool\HttpRequest;

class Road
{
	private $_path;
	private $_controller;
	private $_action;
	private $_method;
	private $_param;
	
	public function __construct(object $road)
	{
		$this->_path = $road->path;
		$this->_controller = $road->controller;
		$this->_action = $road->action;
		$this->_method = $road->method;
		$this->_param = $road->param;
	}
	
	public function getParam(): array
	{
		return $this->_param;
	}

	public function run(object $httprequest): void
	{
		$pathcontroller = "\App\controller\\";
		$controllername =$pathcontroller . $this->_controller ;
		if (class_exists($controllername)) {
		    $contre = new $controllername($httprequest);
			if(method_exists($contre, $this->_action)) {
				$contre->{$this->_action}(...$httprequest->getParam());
			}
		}
	}
} 