<?php
define('CORE_INDEX', 1);
	$view = '';
	require 'action.php';
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
			<li><a href="index.php?action=insertUser">[+]</a></li>
			<li><a href="index.php?action=booksItems">Книги</a></li>
			<li><a href="index.php?action=usersItems">Пользователи</a></li>
		</ul>
	</div>
	<div class="content">
		<?php include $view; ?>
	</div>
</body>
</html>


