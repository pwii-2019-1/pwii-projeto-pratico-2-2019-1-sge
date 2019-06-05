<?php
require_once 'header.php';

use core\controller\Eventos;
use core\sistema\Autenticacao;
use core\sistema\Util;
use core\sistema\Footer;

if (!Autenticacao::verificarLogin()) {
    header('Location: login.php');
}

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
				<?php if (!Autenticacao::usuarioAdministrador()) { ?>
					<h1 class="h3 mb-3 font-weight-normal text-center">Cadastre-se nas Atividades</h1>
				<?php } else { ?>
					<h1 class="h3 mb-3 font-weight-normal text-center">Gerenciar as Atividades</h1>
				<?php }?>
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
							<?php if (!Autenticacao::usuarioAdministrador()) { ?>
								<th scope="col"></th>
							<?php } ?>
							<th scope="col">Horário</th>
							<th class="col-md-6" scope="col">Título</th>
							<th scope="col">Responsável</th>
							<th scope="col">Local</th>
							<?php if (Autenticacao::usuarioAdministrador()) { ?>
								<th scope="col">Opções</th>
							<?php } else { ?>
								<th scope="col">Vagas</th>
							<?php }?>
						</tr>
					</thead>
					<tbody>
						<tr>
                            <!-- Colocar o 'atividade_id' da atividade no id e no for -->
							<?php if (!Autenticacao::usuarioAdministrador()) { ?>
								<td><input type="checkbox" value="" id="1"></td>
							<?php } ?>
							<td>10:30h às 11:00h</td>
							<td><label class="mb-0" for="1">MESA REDONDA - Mulheres expoentes: tecnologia, cultura, ética e transparência</label></td>
							<td>STEM</td>
							<td>Laboratório 1</td>

							<!-- verificar se não está muito proximo de começar a atividade para não deixar Excluir e Editar -->
							<?php if (Autenticacao::usuarioAdministrador()) { ?>
								<td>
									<a class="btn btn-outline-info" href="#" id="botao_alterar" title="Editar">
										<i class="fas fa-edit"></i>
									</a>
									<a class="btn btn-outline-danger" href="#" id="botao_excluir" title="Excluir">
										<i class="fas fa-trash-alt"></i>
									</a>
								</td>
							<?php } else{ ?>
								<td>24/40</td>
							<?php } ?>
						</tr>

					</tbody>
				</table>
			</div>
			<div class="tab-pane fade" id="dia2" role="tabpanel" aria-labelledby="dia2-tab">
				Copiar do primeiro!
			</div>
			<div class="tab-pane fade" id="dia3" role="tabpanel" aria-labelledby="dia3-tab">
				Copiar do primeiro.
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
