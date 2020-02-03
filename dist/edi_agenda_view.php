<?php

include_once 'header.php';

if(Input::get('id')) {
    $id = $_REQUEST['id'];
    $pessoa = new Pessoa();
    $pessoa->find($id);
    $resultados = $pessoa->data();

    if(Input::exists()){
            $validate = new Validate();
            $validate->check($_POST, array(
                'nome' => array(
                    'obrigatorio' => true
                ),
                'fone' => array(
                    'obrigatorio' => true,
                    'min' => 13
                )
            ));

            if($validate->passed()) {
                try{
                    $pessoa->edit($id, array(
                        'nome' => Input::get('nome'),
                        'fone' => Input::get('fone')
                    ));

                    Session::flash('home', 'Dados alterados com sucesso');
                    echo "<script>location.href='dashboard.php'</script>";


                } catch (Exception $e) {
                    echo $e->getMessage();
                }

            } else {
                echo '<div class="container">';
                echo '<div class="alert-danger">';
                foreach ($validate->errors() as $item) {
                    echo "<b>$item&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;</b>";
                }
                echo '</div>';
                echo '</div>';
            }

    }

} else {
    echo "<script>location.href='dashboard.php'</script>";
}

?>

<div class="container">

    <h2 class="text-center">Editar Contato</h2>
    <hr/>

    <form action="edi_agenda_view.php" method="post">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" autocomplete="off" name="nome" id="nome" value="<?php echo $resultados->nome;?>">
        </div>

        <div class="form-group">
            <label for="fone">Fone</label>
            <input type="text" placeholder="Adicione um/ ou mais..." autocomplete="off" class="form-control" name="fone" id="fone" value="<?php echo $resultados->fone;?>">
        </div>

        <input type="hidden" name="id" value="<?php escape($id);?>">
        <button type="submit" class="btn btn-primary pull-right" style="margin-bottom: 10px;"><i class="fa fa-"></i> Editar</button>

    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script type="text/javascript">
    $("#fone").mask("(00)00000-0000 / (00)00000-0000 / (00)00000-0000");
</script>