<?php


// Helper: Gerador de Token
class Token
{
    // Cria Um Hash Aleatório e Armazena numa Sessao
    public static function generate() {
        return Session::put(Config::get('session/token_name'), md5(uniqid()));
    }

    // Verifica se o Hash Gerado Coincide com o Armazenado na Sessão
    public static function check($token) {
        $tokenName = Config::get('session/token_name');

        if(Session::exists($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }
        return false;
    }

}