<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 14/11/2017
 * Time: 17:48
 */

// echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"';

/**
 * Routing
 */
require '../Core/Router.php';
$router = new Router();
//echo get_class($router);

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);

/*echo '<pre>';
var_dump($router->getRoutes());
echo '</pre>';*/

$url = $_SERVER['QUERY_STRING'];

if($router->match($url)){
	var_dump($router->getParams());
}else{
	echo "No route found";
}