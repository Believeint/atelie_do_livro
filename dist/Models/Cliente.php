<?php


class Cliente extends Pessoa
{
    private $_db;
    private $_data;
    private $_count;

    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    public function create($fields = array()) {
        if(!$this->_db->insert('clientes', $fields)) {
            throw new Exception("Não foi possível registrar um novo cliente.");
        }
    }

    public function retrieve() {
      $this->_data = $this->_db->query("SELECT * FROM clientes")->result();
      $this->_count = $this->_db->count();
    }

    public function clienteMultiSearch($fields = array(), $search) {
        $this->_db->multiSearch('clientes', $fields, $search);
        $this->_data = $this->_db->result();
        $this->_count = $this->_db->count();
    }


    public function find($id)
    {
        $this->_data = $this->_db->get('clientes', array('id', '=', $id))->first();
    }

    public function remove($id) {
        if($this->_db->delete("clientes", array('id', '=', $id)))
            return true;
        else
            return false;
    }

    public function data() {
        return $this->_data;
    }

    public function count()
    {
        return $this->_count;
    }

}