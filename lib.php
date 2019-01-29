<?php

class Db {

	protected function connect() {
		try {
			$user = 'root';
			$pass = '';
			$db = new PDO('mysql:host=localhost;dbname=booksphp', $user, $pass, [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'
			]);
			return $db;
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}
	}
}

class Session {

	function startSession() {
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
	}

	function closeSession() {
		if ( session_status() !== PHP_SESSION_NONE ) {
			session_commit();
			//setcookie(session_name(), session_id(), time()-60*60*24);
			//session_unset();
			//session_destroy();
		}
	}

	function destroySessin() {
		if (session_status() !== PHP_SESSION_NONE) {
			setcookie(session_name(), session_id(), time()-60*60*24);
			session_unset();
			session_destroy();
		}
	}
}