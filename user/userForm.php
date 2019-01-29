<?php
	defined('CORE_INDEX') or die('restricted access');

if (empty($formAction)) {
	$formAction = '';
	//var_dump( $titleU);
	if (!$user) {

	}
}

?> 

<h1>Добавление пользователя <?php //$titleU ?></h1>
<form class="add" action="index.php?<?= $formAction ?>" method="post">
	<div style="overflow: hidden; height: 0;">
		<input type="password" name="fakePassword">
	</div>
	<input name="name" type="text" class="nameUser" value="<?= 2//$user->name ?? '' ?>">
	<input name="login" type="text" class="login" value="<?= 2//$user->login ?? '' ?>">
	<input name="password" type="password" class="password" value="<?= 2//$user->password ?? '' ?>">
	<input name="email" type="text" class="email" value="<?= 2//$user->email ?? '' ?>">
	<?php /*<input name="password" type="text" class="author" value="<?= $user->password ?? '' ?>"> */?>
	<button type="submit">Сохранить пользователя</button>
</form>
