<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 15/11/2017
 * Time: 11:00
 */

namespace App\Controllers;

use App\Auth;
use \Core\View;


class Home extends \Core\Controller {

	public function indexAction()
	{
		View::renderTemplate('Home/index.twig', [
			'name' => 'Simple PHP Framework'
		]);
	}
}