<?php

require_once "Core/init.php";

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validate->check($_POST, array(
            'login_usuario' => array(
                'obrigatorio' => true,
                'min' => 2,
                'max' => 20,
                'unico' => 'usuarios'
            ),
            'senha_usuario' => array(
                'obrigatorio' => true,
                'min' => 6
            ),
            'senha_usuario2' => array(
                'obrigatorio' => true,
                'combinam' => 'senha_usuario'
            ),
            'nome_usuario' => array(
                'obrigatorio' => true,
                'min' => 2,
                'max' => 50
            )));

        if($validate->passed()) {
            $user = new Usuario();
            $salt = Hash::salt();
            try {
                $user->create(array(
                    'login_usuario' => Input::get('login_usuario'),
                    'senha_usuario' => Hash::make(Input::get('senha_usuario')),
                    'salt' => $salt,
                    'nome_usuario' => Input::get('nome_usuario'),
                    'data_cadastro' => date('Y-m-d H:i:s'),
                    'grupo' => 1
                ));

                Session::flash('home', 'Cadastro realizado com sucesso! Agora você pode logar.');
                Redirect::to('index.php');
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            print_r($validate->errors());
        }
    }

}

?>

<form action="" method="post">

    <div>
        <label for="login_usuario">Login de Usuário</label>
        <input type="text" name="login_usuario" id="login_usuario" autocomplete="off">
    </div>

    <div>
        <label for="senha_usuario">Digite uma Senha</label>
        <input type="password" name="senha_usuario" id="senha_usuario">
    </div>

    <div>
        <label for="senha_usuario2">Digite uma Senha</label>
        <input type="password" name="senha_usuario2" id="senha_usuario2">
    </div>

    <div>
        <label>Qual Seu Nome?</label>
        <input type="text" name="nome_usuario" id="nome_usuario">
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Registrar">

</form>


