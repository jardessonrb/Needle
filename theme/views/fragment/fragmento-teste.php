<link rel="stylesheet" type="text/css" href="<?= url("/theme/css/style-teste.css"); ?>">
<link rel="stylesheet" type="text/css" href="../../theme/css/style-teste.css">
<?php while($mostrar = mysqli_fetch_row($result)): ?>
	<div class="fragment">
		<h4><?= $mostrar[0] ?> <?= $mostrar[1] ?><?= $mostrar[2] ?><a class="remove" href="#" data-action="<?php echo $router->route("web.delete"); ?>" data-id="<?= $mostrar[3]; ?>">Del</a></h4>
	</div>
	<!-- <tr>
		<td><?php echo $mostrar[0] ?></td>
		<td><?php echo $mostrar[1] ?></td>
		<td><?php echo $mostrar[2] ?></td>
		<td class="remove"><a class="remove" href="#" data-action="<?php echo $router->route("web.delete"); ?>" data-id="<?= $mostrar[3]; ?>">Del</a></td>
	</tr> -->
<?php endWhile; ?>
