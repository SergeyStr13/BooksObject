<?php
namespace user;
//require 'lib.php';
use app\App;
use app\Database;
use PDO;

/**
 * Class User
 * @package user
 */
class User {

	public $id;
	public $name;
	public $login;
	public $password;
	public $email;

	//public $db = $this->connect();

	public function __construct($fields = []) {
		foreach ((array) $fields as $field => $value) {
			if (property_exists($this, $field)) {
				$this->$field = $value;
			}
		}
		/*$fields = (array) $fields;
		$this->id = $fields['id'] ?? '';
		$this->name = $fields['name'] ?? '';
		$this->login = $fields['login'] ?? '';
		$this->password = $fields['password'] ?? '';
		$this->email = $fields['email'] ?? '';*/
	}

	public static function getUserById($id) {
		$db = App::getInstance()->db->getConnection();
		$query = $db->query("select * from user where id=$id"); // todo: сделать безопасно через плейсхолдер
		$query->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, User::class);
		$user = $query->fetch();

		return $user ? new User($user) : null;
	}

	public static function getUsers() {
		$db = App::getInstance()->db->getConnection();
		$query = $db->query('select * from user');
		$users = $query->fetchAll(PDO::FETCH_OBJ);//PDO::FETCH_ASSOC);
		return $users;
	}

	public function save() {
		$db = App::getInstance()->db->getConnection();
		if ($this->id) {
			$query = $db->prepare("update user set name = :name, login = :login, "
				."password = :password, email = :email where user.id= :id");
			$query->execute((array) $this);
		} else {
			$user = (array) $this;
			$keys = array_keys($user);
			$fields = implode(',',$keys);
			$values = implode(',',array_fill(0, count($keys), '?')); // "'".implode("','", array_values($user))."'";
			$query = $db->prepare("insert into user ({$fields}) values ({$values}) ");
			$query->execute(array_values($user));
		}
	}

	public function delete() {
		$db = App::getInstance()->db->getConnection();
		$query = $db->prepare("delete from user where user.id = ?");
		$query->execute([$this->id]);
	}
}