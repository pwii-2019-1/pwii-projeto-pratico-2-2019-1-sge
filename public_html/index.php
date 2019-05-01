<!doctype html>
<html>
	<head>
		<title>SGE</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<!-- Biblioteca de ícones do Font Awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

		<style type="text/css">
			.card-columns{
				column-count: 4;
			}
		</style>
	</head>

	<body>
		<!-- NAVBAR-->
		<nav class="navbar navbar-dark bg-dark">
			<a href="index.php" class="navbar-brand text-light">SGE</a>
			<div class="dropdown dropleft">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-align-justify"></i>
				</button>
				<div class="dropdown-menu" >
					<a class="dropdown-item" href="#">Opção 1</a>
					<a class="dropdown-item disabled" href="#">Opção 2</a>
					<a class="dropdown-item" href="#">Opção 3</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Opção 5</a>
				</div>
			</div>
		</nav>
		<!-- NAVBAR-->

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="">
						<p></p>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="card-columns">

				<!-- card com shadow (tipo um sombreado)-->
				<div class="card text-center shadow-sm">
					<div class="card-body">
						<h4 class="card-title">Nome do evento</h4>
						<p class="card-text">
							Aqui podemos colocar a descrição do evento.
						</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
								<a href="#" class="btn btn-outline-secondary">View</a>
								<a href="#" class="btn btn-outline-success">Inscrever-se</a>
							</div>
							<small class="text-muted">15/05/2019</small>
						</div>
					</div>
					<div class="card-footer text-muted bg-success p-1"> </div>
				</div>

				<div class="card text-center">
					<div class="card-body">
						<h4 class="card-title">Nome do evento</h4>
						<p class="card-text">
							Aqui podemos colocar a descrição do evento.
						</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
								<a href="#" class="btn btn-outline-secondary">View</a>
								<a href="#" class="btn btn-outline-success">Inscrever-se</a>
							</div>
							<small class="text-muted">15/05/2019</small>
						</div>
					</div>
					<div class="card-footer text-muted bg-success p-1"> </div>
				</div>
				<div class="card text-center">
					<div class="card-body">
						<h4 class="card-title">Nome do evento</h4>
						<p class="card-text">
							Aqui podemos colocar a descrição do evento.
							obs.: footer bem pequeno
						</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
								<a href="#" class="btn btn-outline-secondary">View</a>
								<a href="#" class="btn btn-outline-success">Inscrever-se</a>
							</div>
							<small class="text-muted">15/05/2019</small>
						</div>
					</div>
					<div class="card-footer text-muted bg-success p-0"> </div> <!--p-numero determina a grossura do footer-->
				</div>
				<div class="card text-center">
					<div class="card-body">
						<h4 class="card-title">Nome do evento</h4>
						<p class="card-text">
							Aqui podemos colocar a descrição do evento.
							Aqui podemos colocar a descrição do evento.
							Aqui podemos colocar a descrição do evento.
						</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
								<a href="#" class="btn btn-outline-secondary">View</a>
								<a href="#" class="btn btn-outline-success">Inscrever-se</a>
							</div>
							<small class="text-muted">15/05/2019</small>
						</div>
					</div>
					<div class="card-footer text-muted bg-warning p-1"> </div>
				</div>
				<div class="card text-center">
					<div class="card-body">
						<h4 class="card-title">Nome do evento</h4>
						<p class="card-text">
							Aqui podemos colocar a descrição do evento.
							Aqui podemos colocar a descrição do evento.
						</p>
						<div class="d-flex justify-content-between align-items-center">
							<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
								<a href="#" class="btn btn-outline-secondary">View</a>
								<a href="#" class="btn btn-outline-success disabled">Inscrever-se</a>
							</div>
							<small class="text-muted">15/02/2015</small>
						</div>
					</div>
					<div class="card-footer text-muted bg-danger p-1"> </div>
				</div>
			</div>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
