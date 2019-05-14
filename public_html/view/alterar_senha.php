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

    <main role='main'>
        <div class="container center-block">
            <div class="row">
                <div class="col">
                    <h1 class="display-4 text-center">SGE</h1>
                    <h1 class="h3 mb-3 font-weight-normal text-center">Alterar Senha</h1>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <form class="form-signin">
                        <div class="form-row mb-4">
                            <div class="form-group col">
                                <label for="senha">Senha Atual:</label>
                                <input type="password" id="senha" class="form-control" placeholder="Digite sua senha atual" required autofocus>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="senha_nova">Nova Senha:</label>
                                <input type="password" id="senha_nova" class="form-control" placeholder="Digite sua nova senha" required autofocus>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="confirm_senha">Confirmação de Senha:</label>
                                <input type="password" id="confirm_senha" class="form-control" placeholder="Confirme sua nova senha" required autofocus>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-3 ml-md-auto">
                                <button class="btn btn-outline-primary btn-block" type="submit">Alterar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-muted bg-dark fixed-bottom p-1">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
