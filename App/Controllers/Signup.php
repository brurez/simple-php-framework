<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 16/11/2017
 * Time: 10:20
 */

namespace App\Controllers;

use \Core\View;
use \App\Models\User;

class Signup extends \Core\Controller {

	public function newAction(){
		View::renderTemplate('Signup/new.twig');
	}

	public function createAction(){
		$user = new User($_POST);
		if($user->save()){
			static::redirect('/signup/new');

		}else{
			View::renderTemplate('Signup/new.twig', [
				'user' => $user
			]);
		}
	}

	public function successAction(){
		View::renderTemplate( 'Signup/success.twig' );
	}

}