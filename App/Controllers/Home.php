<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 15/11/2017
 * Time: 11:00
 */

namespace App\Controllers;


class Home extends \Core\Controller {
	public function index()
	{
		echo 'Hello from the index action in the Home controller!';
	}
}