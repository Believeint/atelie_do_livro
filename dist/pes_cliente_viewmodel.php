<?php

require_once 'Core/init.php';

$id = $_REQUEST['id'];

$cliente = new Cliente();


switch ($_REQUEST['acao']) {
    case 'excluir':
        if($cliente->remove($id)) {
            Session::flash('deleted_success', 'Excluido  com sucesso');
            Redirect::to('pes-cliente-view.php');
        }
        break;
    case 'detalhar':
        Redirect::to('det-cliente-view.php' . "?id=$id");
        break;
    default:
        Redirect::to('dashboard.php');
        break;
}

if(isset($_POST['query'])) {
    echo "Recebido";
} else {
    echo "Não Recebido";
}

