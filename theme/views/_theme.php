
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title><?= $title; ?></title>
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?= url("/theme/assets/fontawesome/css/all.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?= url("/theme/css/general.css"); ?>">
	<script type="text/javascript" src="<?= url("/theme/assets/jquery3.4.1.js") ?>"></script>
</head>
<body>
<header>
	<div class="logo">Needle-Software</div>
	<nav>
		<ul>
			<li><a href="<?= url("") ?>">Home</a></li>
			<li><a href="#">About</a></li>
			<li class="sub-menu"><a href="#">Serviços <i class="fas fa-sort-down"></i></a>
				<ul>
					<li><a href="<?= url("cadastro-impressora") ?>">Cadastro Impressora</a></li>
					<li><a href="<?= url("cadastro-predio") ?>">Cadastro Predio</a></li>
					<li><a href="<?= url("cadastro-setor") ?>">Cadastro Setor</a></li>
					<li><a href="<?= url("cadastro-empresa") ?>">Cadastro Empresa</a></li>
				</ul>
			</li>
			<li class="sub-menu"><a href="#">Portifolio <i class="fas fa-sort-down"></i></a>
				<ul>
					<li><a href="<?= url("pagina-teste") ?>">Teste</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
					<li><a href="#">Link 4</a></li>
				</ul>
			</li>
			<li><a href="<?= url("sobre") ?>">Sobre nós</a></li>
			<li><a href="#">Sair</a></li>
		</ul>
	</nav>
	<div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
</header>
<section class="import-pagina">
	<?= $v->section("content"); ?>
</section>
<footer class="main_footer">
	<ul>
		<li><?= SITE; ?> - Todos os direitos reservados - Criado por - <?=CREATOR; ?></li>
	</ul>
</footer>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('.menu-toggle').click(function(){
			$('nav').toggleClass('active')
		})
		$('ul li').click(function (){
			$(this).siblings().removeClass('active');
			$(this).toggleClass('active');
		})
	})
</script>