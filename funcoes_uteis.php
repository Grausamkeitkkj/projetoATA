<?php

function limpa_texto($str) {
    return preg_replace('/[^0-9]/', '', $str);
}

function limpa_cpf($str){
    return preg_replace('/[.-]/', '', $str);
}

function formata_telefone($str) {
    $str = limpa_texto($str);
    return "(" . substr($str, 0, 2) . ") " . substr($str, 2, 5) . "-" . substr($str, 7);
}

function formata_cpf($str){
    $str = limpa_cpf($str);
    return substr($str, 0, 3) . "." . substr($str, 3, 3) . "." . substr($str, 6, 3) . "-" . substr($str, 9);
}