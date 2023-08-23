<?php

class Conta {
    private $saldo;
    function getSaldo(){
        return $this->saldo;
    }
    function setCredito($valor){
        $this->saldo += $valor;
    }
}
?>