<?php

// Helper: Validação de Campos
class Validate
{
    private $_passed = false;
    private $_errors = array();
    private $_db = null;

    // Armazena uma Instância da Conexão na Variável "_db"
    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    // Adiciona o Erro da Regra em um Array
    public function addError($error) {
        $this->_errors[] = $error;
    }

    // Realiza Validação dos Campos
    public function check($source, $items = array()) {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                $value = ($source[$item]);
                $item = escape($item);

                if($rule === "obrigatorio" && empty($value)) {
                    $this->addError("O campo {$item} é Obrigatório");
                } elseif (!empty($value)) {
                    switch ($rule) {
                        case 'min':
                            if(strlen($value) < $rule_value) {
                                $this->addError("{$item} precisa ter no mínimo {$rule_value} caracteres");
                            }
                            break;
                        case 'max':
                            if(strlen($value) > $rule_value) {
                                $this->addError("{$item} só pode ter no máximo {$rule_value} caracteres");
                            }
                            break;
                        case 'combinam':
                            if($value != $source[$rule_value]) {
                                $this->addError("{$rule_value} precisam ser igual a {$item}");
                            }
                            break;
                        case 'unico':
                            $check = $this->_db;
                            $check->get($rule_value, array($item, '=', $value));
                            if($check->count()) {
                                $this->addError("{$item} Encontrado na Base de Dados");
                            }
                            break;
                        }
                    }
                }
            }
        if(empty($this->_errors)) {
            $this->_passed = true;
        }
        return $this;
    }

    // Retorna os Erros de Validações Acumulados
    public function errors() {
        return $this->_errors;
    }

    // Retorna Resultado da Validação
    public function passed() {
        return $this->_passed;
    }

}