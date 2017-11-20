<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 15/11/2017
 * Time: 11:33
 */

namespace Core;

use App\Auth;

abstract class Controller {
	protected $route_params = [];

	public function __construct( $route_params ) {
		$this->route_params = $route_params;
	}

	public function __call( $name, $args ) {
		$method = $name . 'Action';

		if ( method_exists( $this, $method ) ) {
			if ( $this->before() !== false ) {
				call_user_func_array( [ $this, $method ], $args );
				$this->after();
			}
		} else {
			throw new \Exception( "Method $method not found in controller " .
			                      get_class( $this ) );
		}
	}

	/**
	 * Before filter - called before an action method.
	 *
	 * @return void
	 */
	protected function before() {
	}

	/**
	 * After filter - called after an action method.
	 *
	 * @return void
	 */
	protected function after() {
	}

	public function redirect( $url ) {
		header( 'Location: http://' . $_SERVER['HTTP_HOST'] . $url, true, 303 );
		exit;
	}

	public function requireLogin(){
		if( ! Auth::isLoggedIn()) {
			Auth::rememberRequestedPage();

			$this->redirect('/login');
		}
	}
}