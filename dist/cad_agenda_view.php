<?php require_once 'header.php';

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validate->check($_POST, array(
            'nome' => array(
                'obrigatorio' => true,
                'max' => 50
            ),
            'fone' => array(
                'obrigatorio' => true,
                'min' => 14
            )));

        if($validate->passed()) {
            $pessoa = new Pessoa();
            try {
                $pessoa->create(array(
                    'nome' => Input::get("nome"),
                    'fone' => Input::get("fone")
                ));

                Session::flash('home', 'Cadastro realizado com sucesso');
                //Redirect::to('dashboard.php');
                echo "<script>location.href='dashboard.php'</script>";
            } catch (Exception $e) {
                die($e->getMessage());
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
}


?>

<div class="container">

    <h2 class="text-center">Cadastrar Novo Contato</h2>
    <hr/>

    <form action="cad_agenda_view.php" method="post">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" autocomplete="off" name="nome" id="nome" value="<?php echo escape(Input::get('nome'));?>">
        </div>

        <div class="form-group">
            <label for="fone">Fone</label>
            <input type="text" placeholder="Adicione um/ ou mais..." autocomplete="off" class="form-control" name="fone" id="fone" value="<?php echo escape(Input::get('fone'));?>">
        </div>

        <input type="hidden" name="token" value="<?php echo Token::generate();?>">
        <button type="submit" class="btn btn-primary pull-right" style="margin-bottom: 10px;"><i class="fa fa-"></i> CADASTRAR</button>

    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script type="text/javascript">
    $("#fone").mask("(00)00000-0000 / (00)00000-0000 / (00)00000-0000");
</script>