<?php
namespace App\tool;

use App\tool\Road;
use PDO;
use DOMDocument;
use App\tool\HttpRequest;

class Router
{
    private $_listroad;
	
	public function __construct()
	{
		$stringroad = file_get_contents('Config/route.json');
		$this->_listroad = json_decode($stringroad);
		
	}
	
	public function findRoad(object $httprequest): Road
	{
		$roadfound = array_filter($this->_listroad,function($jkbjbjh) use ($httprequest){
			return preg_match("#^" . $jkbjbjh->path . "$#", $httprequest->getUrl()) && $jkbjbjh->method == $httprequest->getMethod();
		});
		
		$numberroad = count($roadfound);
		if($numberroad > 1 || $numberroad == 0) {
			header('location:'.$_SERVER['HTTP_REFERER']);
		} else {
			return new Road(array_shift($roadfound));	
		}
	}
}