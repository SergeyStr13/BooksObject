<?php
defined('CORE_INDEX') or die('restricted access');

?>
<h1>Пользователи</h1>
<a class="add" href="index.php?action=userForm" onclick="add">[+]</a>

<table>
	<tr>
		<th>Имя</th>
		<th>Логин</th>
		<th>Почта</th>
		<th></th>
	</tr>
	<tbody>
		<?php// foreach ($users as $key => $user): ?>
			<tr>
				<td><?=1 ?></td>
				<td><?=1 ?></td>
				<td><?=1 ?></td>

				<td>
					<a class="edit" href="index.php?action=userForm&idUser=<?=1 // $user->id ?>">[<->]</a>
					<a class="delete" href="index.php?action=deleteUser&idUser=<?=1// $user->id ?>">[-]</a>
				</td>
			</tr>
		<?php// endforeach; ?>
	</tbody>
</table>



