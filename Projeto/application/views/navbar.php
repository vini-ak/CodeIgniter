<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url('includes/bootstrap/css/bootstrap.min.css'); ?>">

	<style type="text/css">
		#nav {
			font-weight: Bold; 
			background-color: #054f77
		}

	</style>

</head>

<body>
	<nav id="nav" class="navbar navbar-expand-sm fixed-top navbar-dark">

		<!-- LOGO -->
		<a class="nav-brand" href="index.php">
			<img src="<?php echo base_url('imagens/logo.png'); ?>" width="50" height="50" alt='logo'>
		</a>

		<!-- HAMBURGUER -->
		<button class="navbar-toggler" data-toggle="collapse" data-target="#nav-target">
			<!-- ICONE -->
			<span class="navbar-toggler-icon ml-auto"></span>
		</button>

		<!-- NAVEGAÇÃO -->
		<div class="collapse navbar-collapse" id="nav-target">
			<form class="form-inline navbar-nav ml-auto">
				<input type="search" name="pesquisar" placeholder="Pesquisar..." aria-label="Pesquisar">
				<button class="btn btn-info btn-sm ml-2">Buscar</button>
			</form>
		</div>
	</nav>


	<!-- JQUERY -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

	<!-- BOOTSTRAP JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	
		

</body>
</html>