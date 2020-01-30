<?php


class Cliente extends Pessoa
{
    private $_db;
    private $_data;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function create($fields = array()) {
        if(!$this->_db->insert('clientes', $fields)) {
            throw new Exception("Não foi possível registrar um novo cliente.");
        }
    }

}