<?php
defined('CORE_INDEX') or die('restricted access');

use user\User;

require 'user/User.php';

$action = $_GET['action'] ?? '';
$params = [];

switch ($action) {
	case 'userForm':
		$view = 'userForm.php';
		break;

	case 'insertUser' :
		$user = new User();
		$user->insertUser();
		break;

	default :
		$user = new User();
		$user->getItemsUsers();
}
extract($params, EXTR_SKIP);