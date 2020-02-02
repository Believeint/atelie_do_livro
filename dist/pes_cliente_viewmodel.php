<?php

require_once 'Core/init.php';

if(!Input::get('acao')) {
    $_REQUEST['acao'] = '';
}

$cliente = new Cliente();


switch ($_REQUEST['acao']) {
    case 'excluir':
        $id = $_REQUEST['id'];
        if($cliente->remove($id)) {
            Session::flash('deleted_success', 'Excluido  com sucesso');
            Redirect::to('pes_cliente_view.php');
        }
        break;
    case 'detalhar':
        $id = $_REQUEST['id'];
        Redirect::to('det_cliente_view.php' . "?id=$id");
        break;
    default:
        if(isset($_POST['query'])) {
            $cliente->clienteMultiSearch(array('razao_social', 'cnpj', 'inscricao_estadual'), $_POST['query']);
            $resultados = $cliente->data();
            if($cliente->count() > 0) {
                print "<table style='margin-top: -25px;' class='table'><tr><td class='alert-info'>Resultados encontrados: " . $cliente->count() . "</td></tr></table>";
            print "<table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>Razão Social</th>
                                <th scope='col'>CNPJ</th>
                                <th scope='col'>Inscrição Estadual</th>
                                <th scope='col'>Município</th>
                                <th scope='col'>Fone</th>
                                <th scope='col'>Ação</th>
                            </tr>
                        </thead>
                        <thead>";
            foreach ($resultados as $resultado) {
                print "<tr>";
                if(strlen($resultado->razao_social) > 40) {
                    $rsocial = substr($resultado->razao_social, 0,40) . '...';
                    print "<td scope='row' title='$resultado->razao_social'>$rsocial</td>";
                } else {
                    print "<td scope='row'>$resultado->razao_social</td>";
                }

                        print "<td>$resultado->cnpj</td>
                               <td>$resultado->inscricao_estadual</td>
                               <td>$resultado->municipio</td>
                               <td>$resultado->fone</td>
                               <td><a title='Detalhar' onclick=\"location.href='pes_cliente_viewmodel.php?acao=detalhar&id=".$resultado->id."'\"><i class='fa fa-cogs'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a title='Excluir' onclick=\"if(confirm('Confirmar Exclusão?')) { location.href='pes_cliente_viewmodel.php?acao=excluir&id=".$resultado->id."' }\"><i class='fa fa-remove'></i></a></td>
                           </tr>";
            }

                       print "</thead>
                   </table>";
            } else {
                print "<table class='table'><tr><td class='alert-info'>Não foram encontrado resultdos</td></tr></table>";
            }
        } else {
            $cliente->retrieve();
            $resultados = $cliente->data();
            if($cliente->count() > 0) {
                print "<table style='margin-top: -25px;' class='table'><tr><td class='alert-info'>Resultados encontrados: " . $cliente->count() . "</td></tr></table>";
                print "<table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col'>Razão Social</th>
                                    <th scope='col'>CNPJ</th>
                                    <th scope='col'>Inscrição Estadual</th>
                                    <th scope='col'>Município</th>
                                    <th scope='col'>Fone</th>
                                    <th scope='col'>Ação</th>
                                </tr>
                            </thead>
                        <thead>";
            foreach ($resultados as $resultado) {
                print "<tr>";
                if(strlen($resultado->razao_social) > 40) {
                    $rsocial = substr($resultado->razao_social, 0,40) . '...';
                    print "<td scope='row' title='$resultado->razao_social'>$rsocial</td>";
                } else {
                    print "<td scope='row'>$resultado->razao_social</td>";
                }

                         print "<td>$resultado->cnpj</td>
                                <td>$resultado->inscricao_estadual</td>
                                <td>$resultado->municipio</td>
                                <td>$resultado->fone</td>
                                <td><a title='Detalhar' onclick=\"location.href='pes_cliente_viewmodel.php?acao=detalhar&id=".$resultado->id."'\"><i class='fa fa-cogs'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a title='Excluir' onclick=\"if(confirm('Confirmar Exclusão?')) { location.href='pes_cliente_viewmodel.php?acao=excluir&id=".$resultado->id."' }\"><i class='fa fa-remove'></i></a></td>
                            </tr>";
            }

                    print "</thead>
                       </table>";
            } else {
                print "<table class='table'><tr><td class='alert-info'>Não foram encontrado resultdos</td></tr></table>";
            }
        }
        break;
}



