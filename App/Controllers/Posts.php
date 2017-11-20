<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 15/11/2017
 * Time: 10:29
 */

namespace App\Controllers;

use \Core\View;
use App\Models\Post;

class Posts extends \App\Controllers\Authenticated {

	public function indexAction() {
		$posts = Post::getAll();
		View::renderTemplate( 'Posts/index.twig', [
			'posts' => $posts
		] );
	}

	public function addNewAction() {
		echo 'Hello from the addNew action in the Posts controller!';
	}

	public function editAction() {
		echo 'Hello from the edit action in the Posts controller!';
		echo '<p>Route parameters: <pre>' .
		     htmlspecialchars( print_r( $this->route_params, true ) ) . '</pre></p>';
	}
}