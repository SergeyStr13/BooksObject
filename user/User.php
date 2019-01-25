<?php
namespace user;

class User {

	protected $name;
	protected $login;
	protected $password;
	protected $email;

	public function __construct() {
	}

	function getUserById() {
	}

	public function getItemsUsers() {
		echo 'Здесь будет список пользователей';

	}

	public function insertUser() {
		echo 'Привет';
	}

	function updateUser() {
	}

	function deleteUser() {
	}
}