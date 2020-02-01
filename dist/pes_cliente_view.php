<?php

require_once 'header.php';

if(Session::exists('deleted_success')) {
    echo "<div id='alert' class='alert-success text-center'>" . "<strong>" .  Session::flash('deleted_success') . "</strong>" . "</div>";
}

$cliente = new Cliente();
$cliente->retrieve();
$clientes = $cliente->data();


?>

    <div class="form-group active">
        <div class="input-group">
            <span class="input-group-addon">Pesquisa rápida</span>
            <input type="text" name="txtPesquisa" id="txtPesquisa" class="form-control" placeholder="Quem está procurando?" aria-label="Search">
        </div>
    </div>

    <div id="result">

    </div>



<!--    <div class="container">-->
<!--        <h1 class="text-center">Manter Cliente</h1>-->
<!--        <hr/>-->
<!---->
<!---->
<!--        <table class="table">-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th scope="col">Nome</th>-->
<!--                <th scope="col">CPNJ</th>-->
<!--                <th scope="col">Inscrição Estadual</th>-->
<!--                <th scope="col">Fone</th>-->
<!--                <th scope="col">Ação</th>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!---->
<!--            --><?php
//            if($cliente->count() > 0) {
//                foreach ($clientes as $c) {
//                    echo "<tr>";
//                    echo "<th scope='row'>$c->razao_social</th>";
//                    echo "<td >$c->cnpj</td>";
//                    echo "<td >$c->inscricao_estadual</td>";
//                    echo "<td >$c->fone</td>";
//                    echo "<td><a title='Visualizar' onclick=\"location.href='pes-cliente-viewmodel.php?&acao=detalhar&id=". $c->id ."'\"><i class=\"fa fa-cogs\"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick=\"if(confirm('Deseja excluir?')) { location.href='pes-cliente-viewmodel.php?&acao=excluir&id=" . $c->id . "';}\" title='Excluir'><i class=\"fa fa-remove\"></i></a></td>";
//                    //<li><a href=""><i class="fa fa-facebook"></i></a></li>
//                    echo "</tr>";
//                }
//            } else {
//                echo "<tr>";
//                echo "<td colspan='5' class='alert-info'>Não foram encontrado resultados</td>";
//
//                echo "</tr>";
//            }
//
//            ?>
<!--            </tbody>-->
<!--        </table>-->
<!--    </div>-->

    <script type="text/javascript">

        setTimeout(function () {
            $("#alert").fadeOut();
        }, 2000);

        $(document).ready(function () {
            carregar_dados();

            function carregar_dados(pesquisa) {
                $.ajax({
                    url: 'pes-cliente-viewmodel.php',
                    method: 'post',
                    data: {query:pesquisa}
                    success:function (dados) {
                        $('$result').html(dados);
                    }
                });
            }

            $('#txtPesquisa').keyup(function () {
                var busca = $(this).val();
                if(busca != '')
                {
                    alert("Você Digitou!");
                }
            })

        });

    </script>

    <script src="js/jquery.js"></script>
<?php











