<?php

require_once '../vendor/autoload.php';

use core\sistema\Footer;

require_once 'header.php';

?>

<div class="container">
    <div class="row">
        <div class="col-sm ">
            <h1 class="display-4">
                <p class="text-center">Encontre aqui seu evento!</p>
            </h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" placeholder="Nome do evento">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <select class="custom-select form-control">
                    <option selected disabled>Situação do Evento</option>
                    <option value="1">Inscrições Abertas</option>
                    <option value="2">Em Andamento</option>
                    <option value="3">Evento Finalizado</option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <select class="custom-select form-control">
                    <option selected disabled>Período</option>
                    <option value="1">Hoje</option>
                    <option value="2">Essa semana</option>
                    <option value="3">Esse mês</option>
                </select>
            </div>
        </div>

    </div>
</div>

<main role='main'>
    <div class="album py-2 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="assets/imagens/default.svg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Nome do evento</h4>
                            <p class="card-text">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn btn-outline-secondary">View</a>
                                    <a href="#" class="btn btn-sm btn-outline-success">Inscrever-se</a>
                                </div>
                                <small class="text-muted">15/02/2015</small>
                            </div>
                        </div>
                        <div class="card-footer text-muted bg-success p-1"></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="assets/imagens/default.svg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Nome do evento</h4>

                            <p class="card-text">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn btn-outline-secondary">View</a>
                                    <a href="#" class="btn btn-sm btn-outline-success">Inscrever-se</a>
                                </div>
                                <small class="text-muted">15/02/2015</small>
                            </div>
                        </div>
                        <div class="card-footer text-muted bg-danger p-1"></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="assets/imagens/default.svg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Nome do evento</h4>

                            <p class="card-text">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn btn-outline-secondary">View</a>
                                    <a href="#" class="btn btn-sm btn-outline-success">Inscrever-se</a>
                                </div>
                                <small class="text-muted">15/02/2015</small>
                            </div>
                        </div>
                        <div class="card-footer text-muted bg-danger p-1"></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="assets/imagens/default.svg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Nome do evento</h4>

                            <p class="card-text">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn btn-outline-secondary">View</a>
                                    <a href="#" class="btn btn-sm btn-outline-success">Inscrever-se</a>
                                </div>
                                <small class="text-muted">15/02/2015</small>
                            </div>
                        </div>
                        <div class="card-footer text-muted bg-danger p-1"></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="assets/imagens/default.svg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Nome do evento</h4>

                            <p class="card-text">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn btn-outline-secondary">View</a>
                                    <a href="#" class="btn btn-sm btn-outline-success">Inscrever-se</a>
                                </div>
                                <small class="text-muted">15/02/2015</small>
                            </div>
                        </div>
                        <div class="card-footer text-muted bg-danger p-1"></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="assets/imagens/default.svg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Nome do evento</h4>

                            <p class="card-text">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn btn-outline-secondary">View</a>
                                    <a href="#" class="btn btn-sm btn-outline-success">Inscrever-se</a>
                                </div>
                                <small class="text-muted">15/02/2015</small>
                            </div>
                        </div>
                        <div class="card-footer text-muted bg-danger p-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav aria-label="Navegação de página exemplo">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Anterior</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Próximo</a>
            </li>
        </ul>
    </nav>
</main>

<?php

$footer = new Footer();

require_once 'footer.php';
