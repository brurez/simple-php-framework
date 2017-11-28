<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 15/11/2017
 * Time: 19:47
 */

namespace Core;

use PDO;
use App\Config;

abstract class Model {
	protected static function getDB() {
		static $db = null;

		if ( $db === null ) {
			try {
				$dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' .
				       Config::DB_NAME . ';port=' . Config::DB_PORT . ';charset=utf8';
				$db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
			} catch ( PDOException $e ) {
				echo $e->getMessage();
			}
		}

		return $db;
	}
}