<?php

require_once 'Core/init.php';

if(!Input::get('acao')) {
    $_REQUEST['acao'] = '';
}

$pessoa = new Pessoa();


switch ($_REQUEST['acao']) {
    case 'excluir':
        $id = $_REQUEST['id'];
        if($pessoa->remove($id)) {
            Session::flash('deleted_success', 'Excluido  com sucesso');
            Redirect::to('pes_agenda_view.php');
        }
        break;
    case 'detalhar':
        $id = $_REQUEST['id'];
        Redirect::to('det_agenda_view.php' . "?id=$id");
        break;
    default:
        if(isset($_POST['query'])) {
            $pessoa->simpleAgendaSearch('nome', $_POST['query']);
            $resultados = $pessoa->data();
            if($pessoa->count() > 0) {
                print "<table style='margin-top: -25px;' class='table'><tr><td class='alert-warning'>Resultados encontrados: " . $pessoa->count() . "</td></tr></table>";
                print "<table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>Nome</th>
                                <th scope='col'>Fone(s)</th>
                                <th scope='col'>Ações</th>
                            </tr>
                        </thead>
                        <thead>";
                foreach ($resultados as $resultado) {
                    print "<tr>
                               <td scope='row'>$resultado->nome</td>
                               <td>$resultado->fone</td>                             
                               <td><a title='Editar' onclick=\"location.href='edi_agenda_view.php?acao=detalhar&id=".$resultado->id."'\"><i class='fa fa-edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a title='Excluir' onclick=\"if(confirm('Confirmar Exclusão?')) { location.href='pes_cliente_viewmodel.php?acao=excluir&id=".$resultado->id."' }\"><i class='fa fa-remove'></i></a></td>
                           </tr>";
                }

                print "</thead>
                   </table>";
            } else {
                print "<table class='table'><tr><td class='alert-warning'>Não foram encontrado resultdos</td></tr></table>";
            }
        } else {
            $pessoa->retrieve();
            $resultados = $pessoa->data();
            if($pessoa->count() > 0) {
                print "<table style='margin-top: -25px;' class='table'><tr><td class='alert-warning'>Resultados encontrados: " . $pessoa->count() . "</td></tr></table>";
                print "<table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col'>Nome</th>
                                    <th scope='col'>Fone(s)</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                        <thead>";
                foreach ($resultados as $resultado) {
                    print "<tr>
                                <td scope='row'>$resultado->nome</td>
                                <td>$resultado->fone</td>
                                <td><a title='Editar' onclick=\"location.href='edi_agenda_view.php?acao=detalhar&id=".$resultado->id."'\"><i class='fa fa-edit'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a title='Excluir' onclick=\"if(confirm('Confirmar Exclusão?')) { location.href='pes_agenda_viewmodel.php?acao=excluir&id=".$resultado->id."' }\"><i class='fa fa-remove'></i></a></td>
                            </tr>";
                }

                print "</thead>
                       </table>";
            } else {
                print "<table class='table'><tr><td class='alert-warning'>Não foram encontrado resultdos</td></tr></table>";
            }
        }
        break;
}



