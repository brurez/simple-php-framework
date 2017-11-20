<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 17/11/2017
 * Time: 15:41
 */

namespace App\Controllers;

use \Core\View;
use \App\Models\User;
use \App\Auth;

class Login extends \Core\Controller {
	/**
	 * Show the login page
	 *
	 * @return void
	 */
	public function newAction() {
		View::renderTemplate( 'Login/new.twig' );
	}

	/**
	 * Log in a user
	 *
	 * @return void
	 */
	public function createAction() {
		$user = User::authenticate( $_POST['email'], $_POST['password'] );

		if ( $user ) {

			Auth::login($user);

			static::redirect( Auth::getReturnToPage() );
		} else {
			View::renderTemplate( 'Login/new.twig', [ 'email' => $_POST['email'] ] );
		}
	}

	public function destroyAction() {

		Auth::logout();

		$this->redirect('/');
	}
}