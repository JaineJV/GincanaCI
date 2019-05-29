<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <title> Sistema de Gincana </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
        
        
    </head>
    <body>
        <nav  class="navbar navbar-light bg-info navbar-expand-md">
            <a class="navbar-brand text-white" href="<?= $this->config->base_url(); ?>"><i class="fab fa-battle-net"></i> Sistema de Gincana </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a href="#" id="menuProvas" class="nav-link dropdown-toggle" data-toggle="dropdown"> Prova </a>
                        <div class="dropdown-menu" aria-labelledby="menuProvas">
                            <a href="<?= $this->config->base_url() . 'Prova/listar'; ?>" class="dropdown-item"> Lista de Provas </a>
                            <a href="<?= $this->config->base_url() . 'Prova/cadastrar'; ?>" class="dropdown-item"> Cadastro de Prova </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" id="menuEquipes" class="nav-link dropdown-toggle" data-toggle="dropdown"> Equipe </a>
                        <div class="dropdown-menu" aria-labelledby="menuEquipes">
                            <a href="<?= $this->config->base_url() . 'Equipe/listar'; ?>" class="dropdown-item"> Lista de Equipes </a>
                            <a href="<?= $this->config->base_url() . 'Equipe/cadastrar'; ?>" class="dropdown-item"> Cadastro de Equipes </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" id="menuIntegrante" class="nav-link dropdown-toggle" data-toggle="dropdown"> Integrantes </a>
                        <div class="dropdown-menu" aria-labelledby="menuIntegrante">
                            <a href="<?= $this->config->base_url() . 'Integrante/listar'; ?>" class="dropdown-item"> Lista de Integrantes </a>
                            <a href="<?= $this->config->base_url() . 'Integrante/cadastrar'; ?>" class="dropdown-item"> Cadastro de Integrante </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" id="menuPontuacao" class="nav-link dropdown-toggle" data-toggle="dropdown"> Pontuação </a>
                        <div class="dropdown-menu" aria-labelledby="menuPontuacao">
                            <a href="<?= $this->config->base_url() . 'Pontuacao/listar'; ?>" class="dropdown-item"> Lista de Pontuação </a>
                            <a href="<?= $this->config->base_url() . 'Pontuacao/cadastrar'; ?>" class="dropdown-item"> Cadastro de Pontos </a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item dropleft">
                        <a href="#" id="menuConfiguracao" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user-cog"></i></a>
                        <div class="dropdown-menu" aria-labelledby="menuConfiguracao">
                            <a class="nav-link" href="<?= $this->config->base_url(); ?>/Usuario/alterar">
                                Configurar <i class="far fa-edit"></i>
                            </a>
                            <a class="nav-link" href="<?= $this->config->base_url() . 'Usuario/sair'; ?>">
                                Sair <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
