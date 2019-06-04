<?php
require_once 'header.php';

use core\controller\Eventos;
use core\sistema\Footer;
use core\sistema\Util;

?>

<main role='main'>
	<div class="jumbotron mt-n3" style="border-radius:0px; background:url(assets/imagens/default.svg);">
		<div class="container mb-5">
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-3">
				<h1 class="display-4 text-center">Nome do Evento</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mb-3">
				<h1 class="h3 mb-3 font-weight-normal text-center">Cadastre-se nas Atividades</h1>
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
		<div class="tab-content mb-2" id="myTabContent">
			<div class="tab-pane fade show active" id="dia1" role="tabpanel" aria-labelledby="dia1-tab">
				<table class="table table-responsive table-hover">
					<thead class="thead-dark">
						<tr>
							<th scope="col"></th>
							<th scope="col">Horário</th>
							<th class="col-md-6" scope="col">Título</th>
							<th scope="col">Responsável</th>
							<th scope="col">Local</th>
						</tr>
					</thead>
					<tbody>
						<tr>
                            <!-- Colocar o 'atividade_id' da atividade no id e no for -->
							<td><input type="checkbox" value="" id="1"></td>
							<td>10:30h às 11:00h</td>
							<td><label class="mb-0" for="1">MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</label></td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
						<tr>
                            <td><input type="checkbox" value="" id="2"></td>
							<td>10:30h às 11:00h</td>
							<td><label class="mb-0" for="2">MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</label></td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
						<tr>
                            <td><input type="checkbox" value="" id="3"></td>
							<td>10:30h às 11:00h</td>
							<td><label class="mb-0" for="3">MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</label></td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="tab-pane fade" id="dia2" role="tabpanel" aria-labelledby="dia2-tab">
				<table class="table table-responsive table-hover">
					<thead class="thead-dark">
						<tr>
                            <th scope="col"></th>
							<th scope="col">Horário</th>
							<th class="col-md-6" scope="col">Título</th>
							<th scope="col">Responsável</th>
							<th scope="col">Local</th>
						</tr>
					</thead>
					<tbody>
                        <tr>
							<td><input type="checkbox" value="" id="4"></td>
							<td>10:30h às 11:00h</td>
							<td><label class="mb-0" for="4">MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</label></td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
						<tr>
                            <td><input type="checkbox" value="" id="5"></td>
							<td>10:30h às 11:00h</td>
							<td><label class="mb-0" for="5">MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</label></td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="tab-pane fade" id="dia3" role="tabpanel" aria-labelledby="dia3-tab">
				<table class="table table-responsive table-hover">
					<thead class="thead-dark">
						<tr>
                            <th scope="col"></th>
							<th scope="col">Horário</th>
							<th class="col-md-6" scope="col">Título</th>
							<th scope="col">Responsável</th>
							<th scope="col">Local</th>
						</tr>
					</thead>
					<tbody>
                        <tr>
							<td><input type="checkbox" value="" id="6"></td>
							<td>10:30h às 11:00h</td>
							<td><label class="mb-0" for="6">MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</label></td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
						<tr>
                            <td><input type="checkbox" value="" id="7"></td>
							<td>10:30h às 11:00h</td>
							<td><label class="mb-0" for="7">MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</label></td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
						<tr>
                            <td><input type="checkbox" value="" id="8"></td>
							<td>10:30h às 11:00h</td>
							<td><label class="mb-0" for="8">MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</label></td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
						<tr>
                            <td><input type="checkbox" value="" id="8"></td>
							<td>10:30h às 11:00h</td>
							<td><label class="mb-0" for="8">MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</label></td>
							<td>STEM</td>
							<td>Laboratório 1</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
        <div class="row mb-5">
            <div class="col-md-3 ml-md-auto">
                <button class="btn btn-outline-success btn-block" id="botao_atividade" type="submit">Salvar</button>
            </div>
        </div>
	</div>
</main>

<?php
$footer = new Footer();
require_once 'footer.php';
?>
