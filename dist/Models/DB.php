<?php

class DB {
    // Conexão com o Pattern Singleton, Conexão Estática
    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error,
            $_results,
            $_count = 0;

    // Tenta uma nova Conexão
    private function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/dbname'), Config::get('mysql/username'),Config::get('mysql/password'));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Retorna Instância de Conexão, e Cria se não Houver
    public static function getInstance() {
        if(!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    // Responsável por Executar as Queries, Recebe o Script SQL e os Parâmetros
    public function query($sql, $params = array()) {
        $this->_error = false;

        if($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            if(count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            if($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

    // Realiza Ações no DB
    public function action($action, $table, $where = array()) {
        if(count($where) == 3) {
            $operators = array('=', '>', '<', '>=', '<=');

            $field     = $where[0];
            $operator  = $where[1];
            $value     = $where[2];

            if(in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

                if(!$this->query($sql, array($value))->error()) {
                    return $this;
                }
            }
            return false;
        }
    }

    public function simpleSearch($table, $field, $search) {
        $sql = "SELECT * FROM {$table} WHERE {$field} LIKE ?";
        $param = "%{$search}%";
        $this->_query = $this->_pdo->prepare($sql);
        $this->_query->bindValue(1, $param);
        if($this->_query->execute()) {
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();
        }
    }

    public function multiSearch($table, $fields = array(), $search) {
      $sql = "SELECT * FROM {$table} WHERE ";
        $x = 1;
      foreach ($fields as $field){
          if($x < count($fields)){
              $sql .= "{$field} LIKE '%{$search}%' OR ";
          } else {
              $sql .= "{$field} LIKE '%{$search}%'";
          }
        $x++;
      }

      if($this->_query = $this->_pdo->query($sql)) {
          $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
          $this->_count = $this->_query->rowCount();
      }




    }

    // Insere Dados no DB
    public function insert($table, $fields = array())
    {
        $keys = array_keys($fields);
        $values = '';
        $x = 1;

        foreach ($fields as $field) {
            $values .= '?';
            if($x < count($fields)) {
                $values .= ', ';
            }
            $x++;
        }

        $sql = "INSERT INTO {$table} (`".implode('`, `', $keys)."`) VALUES ({$values})";

        if(!$this->query($sql, $fields)->error()) {
            return true;
        } else {
            return false;
        }

    }

    // Atualiza Dados por Referência
    public function update($table, $id, $fields = array()) {
        $set = '';
        $x = 1;

        foreach ($fields as $field => $value) {
            $set .= "{$field} = ?";
            if($x < count($fields)) {
                $set .= ', ';
            }
            $x++;
        }


        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

        if(!$this->query($sql, $fields)->error()) {
            return true;
        } else {
            return false;
        }
    }

    // Deleta Dados por Critério
    public function delete($table, $where) {
        return $this->action('DELETE', $table, $where);
    }

    // Retorna Toda a Tabela por Critério
    public function get($table, $where) {
        return $this->action("SELECT *", $table, $where);
    }

    // Retorna Erro(s)
    public function error() {
        return $this->_error;
    }

    // Retorna Resultados
    public function result() {
        return $this->_results;
    }

    // Retorna Quantidade de Registros
    public  function count() {
        return $this->_count;
    }

    // Retorna Primeiro Resultado
    public function first() {
        return $this->result()[0];
    }
}