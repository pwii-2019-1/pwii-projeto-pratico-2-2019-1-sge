<!doctype html>
<html>
<head>
    <title>SGE</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS Autoral -->
    <link rel="stylesheet" href="../assets/css/index.css">

    <!-- Biblioteca de ícones do Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body class="bg-light">
    <!-- NAVBAR-->
    <nav class="navbar navbar-dark bg-dark mb-3">
        <a href="../index.php" class="navbar-brand text-light">SGE</a>
        <div class="dropdown dropleft">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-align-justify"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Opção 1</a>
                <a class="dropdown-item disabled" href="#">Opção 2</a>
                <a class="dropdown-item" href="#">Opção 3</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Opção 5</a>
            </div>
        </div>
    </nav>
    <!-- NAVBAR-->

    <main role="main">
        <div class="container center-block mb-4">
            <div class="row">
                <div class="col">
                    <h1 class="display-4 text-center">SGE</h1>
                    <h1 class="h3 mb-3 font-weight-normal text-center">Cadastro Evento</h1>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-9">
                    <form class="needs-validation" method="post" action="">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" placeholder="Insira o nome do evento" required autofocus>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="evento_inicio">Data de Início:</label>
                                <input type="date" class="form-control" id="evento_inicio" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="evento_termino">Data de Término:</label>
                                <input type="date" class="form-control" id="evento_termino" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="descricao">Descrição:</label>
                            <textarea id="descricao" class="form-control" rows="2" placeholder="Insira a descrição do evento" required></textarea>
                        </div>
                        <hr class="mb-3">
                        <h1 class="h4 mb-3 font-weight-normal">Inscrições</h1>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="data_inicio">Data de Início:</label>
                                <input type="date" class="form-control" id="data_inicio" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="data_termino">Data de Término:</label>
                                <input type="date" class="form-control" id="data_termino" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="data_prorrogacao">Data de Prorrogação do Término:</label>
                                <input type="date" class="form-control" id="data_prorrogacao">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-8"></div>
                            <div class="col-md-2">
                                <button type="reset" class="btn btn-block btn-outline-info">Limpar</button>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-outline-success" id="botao_submit">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-muted bg-dark p-1">
		<div class="container">
			<p class="float-right">
				<a href="#">Back to top</a>
			</p>
			<p class="text-white">Sistema Gerenciador de Eventos, desenvolvido na matéria de Programação Web II.</p>
			<p class="text-white">SGE &copy; 2019 &nbsp; - &nbsp; Disponível no <a href="https://github.com/pwii-2019-1/sge">GitHub</a></p>
		</div>
	</footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../assets/js/cadastro_evento.js"></script>
</body>
</html>
