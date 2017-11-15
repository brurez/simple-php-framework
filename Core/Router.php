<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 14/11/2017
 * Time: 18:04
 */

class Router {

	protected $routes = [];

	protected $params = [];

	public function add($route, $params = []){
		// escape foward slash
		$route = preg_replace('/\//', '\\/', $route);
		$route = preg_replace('/\{([a-z]+)}/', '(?P<\1>[a-z-]+)', $route);
		//custom variables
		$route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
		$route = '/^' . $route . '$/i';

		$this->routes[$route] = $params;
	}

	public function getRoutes(){
		return $this->routes;
	}

	public function match($url){
		foreach ($this->routes as $route => $params){
			if(preg_match($route, $url, $matches)){
				foreach ( $matches as $key => $match ){
					if(is_string($key)){
						$params[$key] = $match;
					}
				}
				$this->params = $params;
				return true;
			}
		}
		//$reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";
		return false;
	}

	public function getParams(){
		return $this->params;
	}

}