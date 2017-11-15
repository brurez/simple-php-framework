<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 15/11/2017
 * Time: 13:14
 */

namespace Core;


class View {
	public static function render($view, $args = []){

		extract($args, EXTR_SKIP);

		$file = "../App/Views/$view";

		if(is_readable($file)) {
			require $file;
		} else {
			echo "$file not found";
		}
	}

	public static function renderTemplate($template, $args = []){
		static $twig = null;

		if($twig === null) {
			$loader = new \Twig_Loader_Filesystem(dirname(__DIR__) . '/App/Views');
			$twig = new \Twig_Environment($loader);
		}

		echo $twig->render($template, $args);
	}
}