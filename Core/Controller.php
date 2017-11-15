<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 15/11/2017
 * Time: 11:33
 */

namespace Core;


abstract class Controller {
	protected $route_params = [];

	public function __construct($route_params) {
		$this->route_params = $route_params;
	}
}