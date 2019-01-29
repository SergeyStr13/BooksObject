<?php
defined('CORE_INDEX') or die('restricted access');

use user\User;

require 'user/User.php';
require 'book/Book.php';

$action = $_GET['action'] ?? '';
$idUser = $_GET['idUser'] ?? '';
$params = [];
//<editor-fold desc="Route User">
//</editor-fold>
switch ($action) {
	case 'booksItems' :
		$book = new \book\Book();
		$view = $book->getItems();
		break;

	/////////////////////////
	/// Users
	case 'userForm':
		$idUser = $_GET['idUser'] ?? '';
		if ($idUser) {
			$user = getUserById($idUser);
			if (!$user) {
				redirect('index.php');
			}
			$formAction = 'action=updateUser&idUser='.$idUser;
			$titleU = 'Редактирование';
		} else {
			$formAction = 'action=insertUser';
			$titleU = 'Добавление';
		}
		$view = 'userForm.php';
		break;

	case 'insertUser' :
		$user = new User();
		$user->insertUser();
		break;

	default :
		$user = new User();
		$view = $user->getItemsUsers();

}
extract($params, EXTR_SKIP);