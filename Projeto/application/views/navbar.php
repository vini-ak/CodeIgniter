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


	<!-- BOOTSTRAP JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="<?php echo base_url('includes/bootstrap/js/bootstrap.min.js'); ?>" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	<!-- JQUERY -->
	<script type="text/javascript" src="includes/jquery-3.4.1.min.js"></script>

</body>
</html>