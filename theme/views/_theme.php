
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title><?= $title; ?></title>
	<link rel="stylesheet" type="text/css" href="fontawesome/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?= url("/theme/assets/fontawesome/css/all.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?= url("/theme/css/general.css"); ?>">
	<script type="text/javascript" src="<?= url("/theme/assets/jquery3.4.1.js") ?>"></script>
</head>
<body>
<header>
	<div class="logo"><img src=""></div>
	<nav>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li class="sub-menu"><a href="#">Services <i class="fas fa-sort-down"></i></a>
				<ul>
					<li><a href="#">Link 1</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
					<li><a href="#">Link 4</a></li>
				</ul>
			</li>
			<li><a href="#">Team</a></li>
			<li class="sub-menu"><a href="#">Portifolio <i class="fas fa-sort-down"></i></a>
				<ul>
					<li><a href="#">Link 1</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
					<li><a href="#">Link 4</a></li>
				</ul>
			</li>
			<li><a href="#">Contact</a></li>
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