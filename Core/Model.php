<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 15/11/2017
 * Time: 19:47
 */

namespace Core;

use PDO;

abstract class Model {
	protected static function getDB() {
		static $db = null;

		if ( $db === null ) {
			$host     = 'localhost';
			$dbname   = 'mvc';
			$username = 'root';
			$password = '';

			try {
				$db = new PDO( "mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password );
			} catch ( PDOException $e ) {
				echo $e->getMessage();
			}
		}

		return $db;
	}
}