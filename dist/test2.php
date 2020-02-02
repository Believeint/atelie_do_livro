<?php

include_once 'Core/init.php';

$db = DB::getInstance();

//$db->multiSearch('clientes', array('cnpj', 'razao_social'), "Minha");
//
//var_dump($db->result());

$db->multiSearch('clientes', array('razao_social', 'cnpj'), 10);

var_dump($db);






