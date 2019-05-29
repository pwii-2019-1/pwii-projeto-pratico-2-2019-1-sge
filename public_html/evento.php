<?php
require_once 'header.php';
use core\sistema\Footer;
?>

<main role='main'>
	<div class="jumbotron mt-n3" style="background:url(assets/imagens/default.svg);">
		<div class="container mb-5">
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-3">
				<h1 class="display-4 text-center">Nome do Evento</h1>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-md-5">
				<div class="card border-warning mb-3">
					<div class="row no-gutters align-items-center">
						<div class="col-md-4 mx-auto text-center">
							<i class="fas fa-calendar-week fa-5x"></i>
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Inscrições</h5>
								<p class="card-text">
									Início: 00/00/00 <br>
									Fim: 00/00/00
								</p>
								<p class="card-text"><small class="text-muted">Inscrições somente pelo site</small></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="card border-success mb-3">
					<div class="row no-gutters align-items-center">
						<div class="col-md-4 mx-auto text-center">
							<i class="fas fa-calendar-check fa-5x"></i>
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Evento</h5>
								<p class="card-text">
									Início: 00/00/00 <br>
									Fim: 00/00/00
								</p>
								<p class="card-text"><small class="text-muted">Se programe para esse programa</small></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="btn-group-vertical">
					<button type="button" class="btn btn-lg btn-outline-dark">Increver-se</button>
					<button type="button" class="btn btn-lg btn-outline-dark">Acompanhar Inscrição</button>
					<button type="button" class="btn btn-lg btn-outline-dark">Certificado</button>
				</div>
			</div>
		</div>

		<div class="row justify-align-center mb-4">
			<div class="col-md-10 offset-md-1">
				<h1 class="display-5 text-center">Sobre o evento</h1>
				<p class="text-justify">
					Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam fugiat, eaque magni ipsa odio
					sit quo necessitatibus? Adipisci quaerat aliquid illum debitis! Expedita porro pariatur inventore,
					tempora optio similique eos. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus
					veritatis odio cumque libero alias minima vero at perspiciatis nulla? Alias nihil beatae culpa nobis
					quas enim nam sequi nostrum. Ut!
				</p>
			</div>
		</div>

		<ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="dia1-tab" data-toggle="tab" href="#dia1" role="tab" aria-controls="dia1" aria-selected="true">
					22/05
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="dia2-tab" data-toggle="tab" href="#dia2" role="tab" aria-controls="dia2" aria-selected="false">
					23/05
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="dia3-tab" data-toggle="tab" href="#dia3" role="tab" aria-controls="dia3" aria-selected="false">
					24/05
				</a>
			</li>
		</ul>
		<div class="tab-content mb-5" id="myTabContent">
			<div class="tab-pane fade show active" id="dia1" role="tabpanel" aria-labelledby="dia1-tab">
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr>
							<th scope="col">Horário</th>
							<th class="col-md-6" scope="col">Título</th>
							<th scope="col">Responsável</th>
							<th scope="col">Local</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>10:30h às 11:00h</td>
							<td>MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
						<tr>
							<td>10:30h às 11:00h</td>
							<td>MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
						<tr>
							<td>10:30h às 11:00h</td>
							<td>MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="tab-pane fade" id="dia2" role="tabpanel" aria-labelledby="dia2-tab">
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr>
							<th scope="col">Horário</th>
							<th class="col-md-6" scope="col">Título</th>
							<th scope="col">Responsável</th>
							<th scope="col">Local</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>10:30h às 11:00h</td>
							<td>MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
						<tr>
							<td>10:30h às 11:00h</td>
							<td>MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="tab-pane fade" id="dia3" role="tabpanel" aria-labelledby="dia3-tab">
				<table class="table table-responsive table-hover table-bordered">
					<thead>
						<tr>
							<th scope="col">Horário</th>
							<th class="col-md-6" scope="col">Título</th>
							<th scope="col">Responsável</th>
							<th scope="col">Local</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>10:30h às 11:00h</td>
							<td>MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
						<tr>
							<td>10:30h às 11:00h</td>
							<td>MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
						<tr>
							<td>10:30h às 11:00h</td>
							<td>MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
						<tr>
							<td>10:30h às 11:00h</td>
							<td>MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>

<?php
$footer = new Footer();
//$footer->setJS('assets/js/cadastro_evento.js');

require_once 'footer.php';
?>
