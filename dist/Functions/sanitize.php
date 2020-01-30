<?php

// CAMADA DE SEGURANÇA ADICIONAL
function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}