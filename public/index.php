<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 14/11/2017
 * Time: 17:48
 */

spl_autoload_register(function ($class) {
	$root = dirname(__DIR__);
	$file = $root . '/' . str_replace('\\', '/', $class) . '.php';
	if (is_readable($file)){
		require $root . '/' . str_replace('\\', '/', $class) . '.php';
	}
});

/**
 * Routing
 */

$router = new Core\Router();
//echo get_class($router);

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

/*// Display the routing table
echo '<pre>';
//var_dump($router->getRoutes());
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo '</pre>';

$url = $_SERVER['QUERY_STRING'];

if($router->match($url)){
	var_dump($router->getParams());
}else{
	echo "No route found";
}*/

$router->dispatch($_SERVER['QUERY_STRING']);