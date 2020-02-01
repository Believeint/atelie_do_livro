<?php

require_once 'Core/init.php';

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validate->check($_POST, array(
            'razao_social' => array(
                'obrigatorio' => true
            ),
            'cnpj' => array(
                'obrigatorio' => true,
                'unico' => 'clientes'
            ),
            'inscricao_estadual' => array(
                'obrigatorio' => true,
                'unico' => 'clientes'
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
            $cliente = new Cliente();
            try {
                $cliente->create(array(
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
                Redirect::to('dashboard.php');
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

