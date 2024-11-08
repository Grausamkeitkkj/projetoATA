<?php

function limpa_texto($str) {
    return preg_replace('/[^0-9]/', '', $str);
}

function formata_telefone($str) {
    $str = limpa_texto($str);
    return "(" . substr($str, 0, 2) . ") " . substr($str, 2, 5) . "-" . substr($str, 7);
}