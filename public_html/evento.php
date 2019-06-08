<?php
require_once 'header.php';

use core\controller\Eventos;
use core\controller\Atividades;
use core\sistema\Autenticacao;
use core\sistema\Footer;
use core\sistema\Util;

$evento_id = isset($_GET['evento_id']) ? $_GET['evento_id'] : null;

$eventos = new Eventos();
$atividades = new Atividades();

$dados_eventos = "";
$evento = "";
$dados_atividades = [];

$evento = $eventos->listarEvento($evento_id);
$atividade = $atividades->listarAtividades($evento_id);

?>

<main role='main'>
	<div class="jumbotron mt-n3" style="border-radius:0px; background:url(assets/imagens/default.svg);">
		<div class="container mb-5">
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-3">
				<h1 class="display-4 text-center"><?= $evento->nome ?></h1>
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
									Início: <?= Util::formataDataBR($evento->data_inicio) ?> <br>
									Fim: <?= Util::formataDataBR($evento->data_termino) ?>
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
									Início: <?= Util::formataDataBR($evento->evento_inicio) ?> <br>
									Fim: <?= Util::formataDataBR($evento->evento_termino) ?>
								</p>
								<p class="card-text"><small class="text-muted">Se programe para esse programa</small></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="btn-group-vertical">
					<a href="atividades.php?evento_id=<?= $evento->evento_id ?>" class="btn btn-lg btn-outline-dark">
						<?= (Autenticacao::usuarioAdministrador()) ? "Atividades" : "Inscrever-se"?>
					</a>
					<?php if (Autenticacao::usuarioAdministrador()) { ?>
						<a href="cadastro_atividade.php?evento_id=<?= $evento->evento_id ?>" class="btn btn-lg btn-outline-dark">
							Adicionar Atividades
						</a>
						<a href="cadastro_evento.php?evento_id=<?= $evento->evento_id ?>" class="btn btn-lg btn-outline-dark">
							Editar
						</a>
					<?php } else { ?>
						<a href="#" class="btn btn-lg btn-outline-dark">Acompanhar Inscrição</a>
						<a href="#" class="btn btn-lg btn-outline-dark">Certificado</a>
					<?php } ?>
				</div>
			</div>
		</div>

		<div class="row justify-align-center mb-4">
			<div class="col-md-10 offset-md-1">
				<h1 class="display-5 text-center">Sobre o evento</h1>
				<p class="text-justify">
					<?= $evento->descricao ?>
				</p>
			</div>
		</div>

		<ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
			<?php if (count($atividade["total_dias"][0]) > 0) {
				foreach ($atividade["total_dias"] as $i => $dia) { ?>
					<li class="nav-item">
						<a class="nav-link <?= $i == 0 ? "active" : "" ?>" id="dia<?= $i ?>-tab" data-toggle="tab" href="#dia<?= $i ?>" role="tab" aria-controls="dia<?= $i ?>" aria-selected="true">
							<?= Util::dia($dia->data) ."/". Util::mes($dia->data) ?>
						</a>
					</li>
				<?php }
			} else { ?>
				<li class="nav-item">
					<a class="nav-link active" id="dia1-tab" data-toggle="tab" href="#dia1" role="tab" aria-controls="dia1" aria-selected="true">
						Programação
					</a>
				</li>
			<?php } ?>
		</ul>
		<div class="tab-content mb-5" id="myTabContent">
			<?php foreach ($atividade["total_dias"] as $i => $dia) { ?>
				<div class="tab-pane fade <?= $i == 0 ? "show active" : "" ?>" id="dia<?= $i ?>" role="tabpanel" aria-labelledby="dia<?= $i ?>-tab">
					<table class="table table-hover table-bordered"  style="min-width: 100%">
						<thead class="thead-dark">
							<tr>
								<th class="col-md-2">Horário</th>
								<th class="col-md-6">Título</th>
								<th class="col-md-2">Responsável</th>
								<th class="col-md-2">Local</th>
							</tr>
						</thead>
						<tbody>
							<?php if (count($atividade["lista_atividades"][0]) > 0) {
								foreach ($atividade["lista_atividades"] as $j => $ativ) {
									if (Util::dia($ativ->datahora_inicio) == Util::dia($dia->data)) {?>
										<tr>
											<td class="align-middle">
												<?= Util::hora($ativ->datahora_inicio) .":". Util::min($ativ->datahora_inicio) ?> às
												<?= Util::hora($ativ->datahora_termino) .":". Util::min($ativ->datahora_termino) ?>
											</td>
											<td class="align-middle"><?= $ativ->titulo ?></td>
											<td class="align-middle"><?= $ativ->responsavel ?></td>
											<td class="align-middle"><?= $ativ->local ?></td>
										</tr>
									<?php }
								}
							} else { ?>
								<tr>
									<td colspan="4">Em Breve!</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			<?php } ?>
		</div>
	</div>
</main>

<?php
$footer = new Footer();
require_once 'footer.php';
?>
