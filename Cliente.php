<?php
class Cliente{
    
    //ATRIBUTOS
  
    private $denominacion;
    private $cuit;
    private $direccion;  //al día, moroso, suspendido


 //CONSTRUCTOR
    public function __construct($denominacion, $cuit, $direccion){
    
       $this->denominacion = $denominacion;
       $this->cuit = $cuit;
       $this->direccion = $direccion;
    }

    public function getDenominacion(){
        return $this->denominacion;
    }
    public function setDenominacion($denominacion){
         $this->denominacion= $denominacion;
    }

    public function getCuit(){
        return $this->cuit;
    }
    public function setCuit($cuit){
         $this->cuit= $cuit;
    }

    
    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
         $this->direccion= $direccion;
    }


public function __toString(){
        //string $cadena
        $cadena = "Denominacion: ".$this->getDenominacion()."\n";
         $cadena = $cadena. "CUIT: ".$this->getCuit()."\n";
        $cadena = $cadena. "Direccion: ".$this->getDireccion()."\n";
 
        return $cadena;
         }

}