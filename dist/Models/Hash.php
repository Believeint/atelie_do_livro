<?php


class Hash
{
    // Concatena com Salt e Transforma em Hash
    public static function make($string, $salt = '') {
        return hash('sha256', $string . $salt);
    }

    // Cria um Salt Para Ser Anexado a Senha
    public static function salt() {
        return hash('md5', rand(mt_rand(), 100));
    }

    // Cria um Hash Único
    public static function unique() {
        return self::make(uniqid());
    }

}