<div id="container">
	<div id="content">
		<div class="error">
			<h2>Ooooops, Erro <?= $error; ?>!</h2><br><br>
			<h6>Verfique URL</h6>
			<h6>Retornar para a <a href="<?=url(); ?>"> Home</a></h6>
		</div>
	</div>
</div>
<?php $v->start("sidebar"); ?>
<nav class="menu">
	<li><a href="<?=url(); ?>">Home</a></li>
</nav>			