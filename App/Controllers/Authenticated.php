<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 20/11/2017
 * Time: 11:57
 */

namespace App\Controllers;


abstract class Authenticated extends \Core\Controller {

	protected function before() {
		$this->requireLogin();
	}
}