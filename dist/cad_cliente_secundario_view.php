<?php require_once 'header.php';

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validate->check($_POST, array(
            'razao_social' => array(
                'obrigatorio' => true
            ),
            'cnpj' => array(
                'obrigatorio' => true,
                'unico' => 'clientes_indireto',
                'exato' => 18
            ),
            'inscricao_estadual' => array(
                'obrigatorio' => true,
                'unico' => 'clientes_indireto'
            ),
            'logradouro' => array(
                'obrigatorio' => true
            ),
            'numero' => array(
                'obrigatorio' => true
            ),
            'complemento' => array(
                'obrigatorio' => false
            ),
            'bairro' => array(
                'obrigatorio' => true
            ),
            'municipio' => array(
                'obrigatorio' => true
            ),
            'uf' => array(
                'obrigatorio' => true
            ),
            'cep' => array(
                'obrigatorio' => true
            ),
            'pais' => array(
                'obrigatorio' => true
            ),
            'fone' => array(
                'obrigatorio' => false
            ),
            'email' => array(
                'obrigatorio' => false
            )));

        if($validate->passed()) {
            $clienteIndireto = new ClienteIndireto();
            try {
                $clienteIndireto->create(array(
                    'razao_social' => Input::get("razao_social"),
                    'cnpj' => Input::get("cnpj"),
                    'inscricao_estadual' => Input::get("inscricao_estadual"),
                    'logradouro' => Input::get("logradouro"),
                    'numero' => Input::get("numero"),
                    'complemento' => Input::get("complemento"),
                    'bairro' => Input::get("bairro"),
                    'municipio' => Input::get("municipio"),
                    'uf' => Input::get("uf"),
                    'cep' => Input::get("cep"),
                    'pais' => Input::get("pais"),
                    'fone' => Input::get("fone"),
                    'email' => Input::get("email")
                ));

                Session::flash('home', 'Cadastro realizado com sucesso');
                //Redirect::to('dashboard.php');
                echo "<script>location.href='dashboard.php'</script>";
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {


            $x = 0;
            $value = "";

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

    <h1 class="text-center">Cadastrar Novo Cliente Indireto</h1>
    <hr/>

    <form action="cad_cliente_secundario_view.php" method="post">

        <div class="form-group">
            <label for="razao_social">Nome/Razão Social</label>
            <input type="text" class="form-control" name="razao_social" id="razao_social" value="<?php echo escape(Input::get('razao_social'));?>">
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" name="cnpj" id="cnpj" autocomplete="off" value="<?php echo escape(Input::get('cnpj'));?>">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="inscricao_estadual">Inscrição Estadual/Municipal</label>
                    <input type="number" class="form-control" maxlength="14" name="inscricao_estadual" id="inscricao_estadual" autocomplete="off" value="<?php echo escape(Input::get('inscricao_estadual'));?>">
                </div>
            </div>
        </div>

        <fieldset style="border: 1px solid rgba(0,0,0,.1);padding-bottom: 20px;margin-bottom: 20px;">
            <legend style="width: auto; padding: 0 10px; border-bottom: none; ">Endereço</legend>
            <div style="width: 95%; margin: auto;">
                <div class="row">

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="logradouro">Logradouro</label>
                            <input type="text" class="form-control" name="logradouro" id="logradouro" value="<?php echo escape(Input::get('logradouro'));?>">
                        </div>
                    </div>

                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" name="numero" id="numero" value="<?php echo escape(Input::get('numero'));?>">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" name="complemento" id="complemento" value="<?php echo escape(Input::get('complemento'));?>">
                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo escape(Input::get('bairro'));?>">
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="municipio">Município</label>
                            <input type="text" class="form-control" name="municipio" id="municipio" value="<?php echo escape(Input::get('municipio'));?>">
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="uf">Estado</label>
                            <select name="uf" id="uf" class="form-control" required value="<?php echo escape(Input::get('uf'));?>">
                                <option value="" selected disabled hidden>Selecionar</option>
                                <option value="AC" <?php if(escape(Input::get('uf') == 'AC')) {echo "selected";} ?>>Acre</option>
                                <option value="AL" <?php if(escape(Input::get('uf') == 'AL')) {echo "selected";} ?>>Alagoas</option>
                                <option value="AP" <?php if(escape(Input::get('uf') == 'AP')) {echo "selected";} ?>>Amapá</option>
                                <option value="AM" <?php if(escape(Input::get('uf') == 'AM')) {echo "selected";} ?>>Amazonas</option>
                                <option value="BA" <?php if(escape(Input::get('uf') == 'BA')) {echo "selected";} ?>>Bahia</option>
                                <option value="CE" <?php if(escape(Input::get('uf') == 'CE')) {echo "selected";} ?>>Ceará</option>
                                <option value="DF" <?php if(escape(Input::get('uf') == 'DF')) {echo "selected";} ?>>Distrito Federal</option>
                                <option value="ES" <?php if(escape(Input::get('uf') == 'ES')) {echo "selected";} ?>>Espírito Santo</option>
                                <option value="GO" <?php if(escape(Input::get('uf') == 'GO')) {echo "selected";} ?>>Goiás</option>
                                <option value="MA" <?php if(escape(Input::get('uf') == 'MA')) {echo "selected";} ?>>Maranhão</option>
                                <option value="MT" <?php if(escape(Input::get('uf') == 'MT')) {echo "selected";} ?>>Mato Grosso</option>
                                <option value="MS" <?php if(escape(Input::get('uf') == 'MS')) {echo "selected";} ?>>Mato Grosso do Sul</option>
                                <option value="MG" <?php if(escape(Input::get('uf') == 'MG')) {echo "selected";} ?>>Minas Gerais</option>
                                <option value="PA" <?php if(escape(Input::get('uf') == 'PA')) {echo "selected";} ?>>Pará</option>
                                <option value="PB" <?php if(escape(Input::get('uf') == 'PB')) {echo "selected";} ?>>Paraíba</option>
                                <option value="PR" <?php if(escape(Input::get('uf') == 'PR')) {echo "selected";} ?>>Paraná</option>
                                <option value="PE" <?php if(escape(Input::get('uf') == 'PE')) {echo "selected";} ?>>Pernambuco</option>
                                <option value="PI" <?php if(escape(Input::get('uf') == 'PI')) {echo "selected";} ?>>Piauí</option>
                                <option value="RJ" <?php if(escape(Input::get('uf') == 'RJ')) {echo "selected";} ?>>Rio de Janeiro</option>
                                <option value="RN" <?php if(escape(Input::get('uf') == 'RN')) {echo "selected";} ?>>Rio Grande do Norte</option>
                                <option value="RS" <?php if(escape(Input::get('uf') == 'RS')) {echo "selected";} ?>>Rio Grande do Sul</option>
                                <option value="RO" <?php if(escape(Input::get('uf') == 'RO')) {echo "selected";} ?>>Rondônia</option>
                                <option value="RR" <?php if(escape(Input::get('uf') == 'RR')) {echo "selected";} ?>>Roraima</option>
                                <option value="SC" <?php if(escape(Input::get('uf') == 'SC')) {echo "selected";} ?>>Santa Catarina</option>
                                <option value="SP" <?php if(escape(Input::get('uf') == 'SP')) {echo "selected";} ?>>São Paulo</option>
                                <option value="SE" <?php if(escape(Input::get('uf') == 'SE')) {echo "selected";} ?>>Sergipe</option>
                                <option value="TO" <?php if(escape(Input::get('uf') == 'TO')) {echo "selected";} ?>>Tocantins</option>
                                <option value="EX" <?php if(escape(Input::get('uf') == 'EX')) {echo "selected";} ?>>Estrangeiro</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" name="cep" id="cep" value="<?php echo escape(Input::get('cep'));?>">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pais">País</label>
                            <input type="text" class="form-control" name="pais" id="pais" value="<?php echo escape(Input::get('pais'));?>">
                        </div>
                    </div>

                </div>
            </div>



        </fieldset>


        <fieldset style="border: 1px solid rgba(0,0,0,.1);padding-bottom: 20px;margin-bottom: 20px;">
            <legend style="width: auto; padding: 0 10px; border-bottom: none; ">Contato</legend>
            <div class="row">
                <div style="width: 95%; margin: auto;">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="fone">Fone</label>
                            <input type="text" class="form-control" name="fone" id="fone" value="<?php echo escape(Input::get('fone'));?>">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo escape(Input::get('email'));?>">
                        </div>
                    </div>
                </div>
            </div>

        </fieldset>

        <input type="hidden" name="token" value="<?php echo Token::generate();?>">
        <button type="submit" class="btn btn-primary pull-right" style="margin-bottom: 10px;"><i class="fa fa-plus-square"></i> CADASTRAR</button>

    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script type="text/javascript">
    $("#cnpj").mask("00.000.000/0000-00");
    $("#cep").mask("00000-000");
    $("#fone").mask("(00) 00000-0000");
    $("#inscricao_estadual").mask("00000000000000");
</script>