<?php
/*
 
De los canales se conoce el tipo de canal, importe y si es HD o no. Algunos ejemplos de tipos de canal son: noticias, interés general, musical, deportivo, películas, educativo, infantil, educativo infantil, aventura.
*/
class Canal{
    
    //ATRIBUTOS
    private $tipo;   //noticias, interés general, musical, deportivo, películas, educativo, infantil, educativo infantil, aventura.
    private $importe;
    private $esHD;
    private $incluyeMG;

 //CONSTRUCTOR
    public function __construct($tipo, $importe, $esHD,$incluyeMG){
    
       $this->tipo = $tipo;
       $this->importe = $importe;
       $this->esHD = $esHD;
       $this->incluyeMG = $incluyeMG;
     

    }

     public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
         $this->tipo= $tipo;
    }

        public function getImporte(){
        return $this->importe;
    }

    public function setImporte($importe){
         $this->importe= $importe;
    }


      public function getEsHD(){
        return $this->esHD;
    }

    public function setEsHD($esHD){
         $this->esHD= $esHD;
    }


      public function getIncluyeMG(){
        return $this->incluyeMG;
    }

    public function setIncluyeMG($incluyeMG){
         $this->incluyeMG= $incluyeMG;
    }

public function __toString(){
        //string $cadena
        $cadena = "Tipo: ".$this->getTipo()."\n";
        $cadena = $cadena. "Importe: ".$this->getImporte()."\n";
        $cadena = $cadena. "Es HD: ".$this->getEsHD()."\n";
        $cadena = $cadena. "Incluye MG: ".$this->getIncluyeMG()."\n";
 
        return $cadena;
         }
     }    
