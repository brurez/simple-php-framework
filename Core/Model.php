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
				$dsn = 'mysql:host=' . getenv('DB_HOST') . ';dbname=' .
				       getenv('DB_NAME') . ';port=' . getenv('DB_PORT') . ';charset=utf8';
				$db = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASSWORD'));
			} catch ( PDOException $e ) {
				echo $e->getMessage();
			}
		}

		return $db;
	}
}