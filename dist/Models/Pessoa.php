<?php


class Pessoa
{
    private $_db;
    private $_data;
    private $_count;

    function __construct()
    {
        $this->_db = DB::getInstance();
    }

    function create($fields) {
        if($this->_db->insert('agenda', $fields))
            return true;
        else
            return false;
    }

    public function retrieve() {
        $this->_data = $this->_db->query("SELECT * FROM agenda")->result();
        $this->_count = $this->_db->count();
    }

    public function edit($id, $fields = array()) {
        if($this->_db->update('agenda',$id, $fields))
            return true;
        else
            return false;
    }

    public function remove($id) {
        if($this->_db->delete('agenda',array('id', '=', $id)))
            return true;
        else
            return false;
    }

    function find($id) {
        $this->_data = $this->_db->get('agenda', array('id', '=', $id))->first();
    }

    function simpleAgendaSearch($field, $search) {
        $this->_db->simpleSearch("agenda", $field, $search);
        $this->_data = $this->_db->result();
        $this->_count = $this->_db->count();
    }

    function data() {
        return $this->_data;
    }

    function count() {
        return $this->_count;
    }

}