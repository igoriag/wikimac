<?php

/**
 * Função de conversão de DATA
 * @author Professor Sávio
 * @version 1.0
 */
function dataBRtoUSA($data) {
    $dataArray = explode("/", $data);
    $dataUSA = $dataArray[2] . "-" . $dataArray[1] . "-" . $dataArray[0];
    return $dataUSA;
}

function dataUSAtoBR($data) {
    $dataArray = explode("-", $data);
    $dataBR = $dataArray[2] . "/" . $dataArray[1] . "/" . $dataArray[0];
    return $dataBR;
}

?>