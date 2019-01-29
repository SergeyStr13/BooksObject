<?php
namespace user;
require 'lib.php';
use Db;

/**
 * Class User
 * @package user
 */
class User  extends  Db {

	protected $name;
	protected $login;
	protected $password;
	protected $email;

	//public $db = $this->connect();

	public function __construct(){ //$name,$login,$password,$email) {
		/*$this->name = $name;
		$this->login = $login;
		$this->password = $password;
		$this->email = $email;*/
	}

	function getUserById($userId) {
		$db = Db::connect();
		if ($userId !== 1) {
			redirect('index.php');
		}
		$query = $db->query('select * from user');
		$users = $query->fetchAll(PDO::FETCH_CLASS);//PDO::FETCH_ASSOC);

		var_dump($users);
		$view = 'usersItems.php';
		return [$view, ['users' => $users]];
	}

	public function getItemsUsers() {
		$view = 'user/userItems.php';
		return $view;
	}

	public function insertUser() {
		echo 'Привет';
	}

	function updateUser() {
	}

	function deleteUser() {
	}
}