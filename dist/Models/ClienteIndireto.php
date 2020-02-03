<?php


class ClienteIndireto extends Cliente
{
    private $_db;
    private $_data;
    private $_count;

    function __construct()
    {
        $this->_db = DB::getInstance();
    }

    function create($fields = array())
    {
        if(!$this->_db->insert('clientes_indireto', $fields)) {
            throw new Exception("Não foi possível registrar um novo cliente indireto.");
        }
    }

    function retrieve()
    {
        $this->_data = $this->_db->query("SELECT * FROM clientes_indireto")->result();
        $this->_count = $this->_db->count();
    }

    function find($id)
    {
        $this->_data = $this->_db->get('clientes_indireto', array('id', '=', $id))->first();
    }

    function remove($id)
    {
        if($this->_db->delete("clientes_indireto", array('id', '=', $id)))
            return true;
        else
            return false;
    }

    function clienteMultiSearch($fields = array(), $search)
    {
        $this->_db->multiSearch('clientes_indireto', $fields, $search);
        $this->_data = $this->_db->result();
        $this->_count = $this->_db->count();
    }

    public function count()
    {
        return $this->_count;
    }

    public function data()
    {
        return $this->_data;
    }

}