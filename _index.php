<?php
define('CORE_INDEX', 1);
	$view = '';
	//require 'action.php';

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
				$user = User::getUserById($idUser);
				if (!$user) {
					redirect('index.php');
				}
				$formAction = 'action=updateUser&idUser='.$idUser;
				$titleU = 'Редактирование';
			} else {
				$formAction = 'action=insertUser';
				$titleU = 'Добавление';
			}
			$view = 'user/userForm.php';
			break;

		case 'insertUser' :
			User::insertUser();
			break;

		default :
			$view = User::getUsers();

	}
	extract($params, EXTR_SKIP);

?>

<html>
<head>
	<meta charset="utf-8">
	<link href="css/form.css" rel="stylesheet">
	<script src="js/scripts.js"></script>
</head>

<body>
	<div class="head">

	</div>
	<div class="menu">
		<ul>
			<li><a href="index.php?action=booksItems">Книги</a></li>
			<li><a href="index.php?action=usersItems">Пользователи</a></li>
		</ul>
	</div>
	<div class="content">
		<?php include $view; ?>
	</div>
</body>
</html>


