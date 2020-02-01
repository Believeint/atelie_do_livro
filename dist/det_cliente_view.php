<?php

require_once 'header.php';

$id = $_REQUEST['id'];

$cliente = new Cliente();
$cliente->find($id);
$c = $cliente->data();

?>


<div class="container">
    <h1 class="text-center">Detalhar Cliente</h1>
    <hr/>

    <ul class="list-group">
        <li class="list-group-item text-justify">
            Nome/Razão Social
            <span class="badge alert-info"><?php echo escape($c->razao_social); ?></span>
        </li>
        <li class="list-group-item text-justify">
            CPNJ
            <span class="badge alert-info"><?php echo escape($c->cnpj); ?></span>
        </li>
        <li class="list-group-item text-justify">
            Inscrição Estadual
            <span class="badge alert-info"><?php echo escape($c->inscricao_estadual); ?></span>
        </li>
        <li class="list-group-item text-justify">
            Logradouro
            <span class="badge alert-info"><?php echo escape($c->logradouro); ?></span>
        </li>
        <li class="list-group-item text-justify">
            Número
            <span class="badge alert-info"><?php echo escape($c->numero); ?></span>
        </li>
        <li class="list-group-item text-justify">
            Complemento
            <span class="badge alert-info"><?php echo escape($c->complemento); ?></span>
        </li>
        <li class="list-group-item text-justify">Nome/Razão Social
            <span class="badge alert-info"><?php echo escape($c->razao_social); ?></span>
        </li>
        <li class="list-group-item text-justify">
            Bairro
            <span class="badge alert-info"><?php echo escape($c->bairro); ?></span>
        </li>
        <li class="list-group-item text-justify">
            Município
            <span class="badge alert-info"><?php echo escape($c->municipio); ?></span>
        </li>
        <li class="list-group-item text-justify">
            Estado
            <span class="badge alert-info"><?php echo escape($c->uf); ?></span>
        </li>
        <li class="list-group-item text-justify">
            CEP
            <span class="badge alert-info"><?php echo escape($c->cep); ?></span>
        </li>
        <li class="list-group-item text-justify">
            País
            <span class="badge alert-info"><?php echo escape($c->pais); ?></span>
        </li>
        <li class="list-group-item text-justify">
            Fone
            <span class="badge alert-info"><?php echo escape($c->fone); ?></span>
        </li>
        <li class="list-group-item text-justify">
            Email
            <span class="badge alert-info"><?php echo escape($c->email); ?></span>
        </li>
    </ul>
</div>
