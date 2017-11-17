<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 17/11/2017
 * Time: 14:59
 */

namespace App\Controllers;

use \App\Models\User;


class Account extends \Core\Controller {

	public function validateEmailAction(){
		$is_valid = ! User::emailExists($_GET['email']);

		header('Content-Type: application/json');
		echo json_encode($is_valid);
	}

}