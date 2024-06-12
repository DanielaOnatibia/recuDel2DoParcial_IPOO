<?php

class ContratoViaWeb extends Contrato{

    private $porcDescuento;

    public function __construct($fechaInicio, $fechaVencimiento, $objPlan, $estado, $renovacion, $objCliente, $porcDescuento){
        parent::__construct($fechaInicio, $fechaVencimiento, $objPlan, $estado, $renovacion, $objCliente);
        $this->porcDescuento = $porcDescuento ?? 0.1;
    }


    public function getPorcDescuento(){
        return $this->porcDescuento;
    }


    public function setPorcDescuento($porcDescuento){
        $this->porcDescuento = $porcDescuento;
    }


    /* si se trata de un contrato via web al importe del mismo 
    se le aplica un porcentaje de descuento que por defecto es del 10% */
    public function calcularImporte(){
        $importe = parent::calcularImporte();
        $importe -= ($importe*$this->getPorcDescuento()); 
        return $importe;
    }

    public function __toString(){
        return "porcentaje de descuento: ".$this->getPorcDescuento();
    }
}