<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 15/11/2017
 * Time: 10:29
 */

namespace App\Controllers;

use \Core\View;

class Posts extends \Core\Controller {
	/**
	 * Show the index page
	 *
	 * @return void
	 */
	public function indexAction()
	{
		View::renderTemplate('Posts/index.twig');
	}

	/**
	 * Show the add new page
	 *
	 * @return void
	 */
	public function addNewAction()
	{
		echo 'Hello from the addNew action in the Posts controller!';
	}

	public function editAction()
	{
		echo 'Hello from the edit action in the Posts controller!';
		echo '<p>Route parameters: <pre>' .
		     htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
	}
}