
<?php
/*
 
De los planes se almacena un código, canales, importe y si incluye MG de datos o no. Por defecto se asume que el plan incluye 50 MG. 
*/
class Plan{
    
    //ATRIBUTOS
    private $codigo;
    private $colCanales;
    private $importe;
    private $incluyeMG;

 //CONSTRUCTOR
    public function __construct($codigo, $colCanales, $importe){
    
       $this->codigo = $codigo;
       $this->colCanales = $colCanales;
       $this->importe = $importe;
       $this->incluyeMG = 0;
  

    }

        public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
         $this->codigo= $codigo;
    }


       public function getColCanales(){
        return $this->colCanales;
    }

    public function setColCanales($colCanales){
         $this->colCanales= $colCanales;
    }


      public function getImporte(){
        return $this->importe;
    }

    public function setImporte($importe){
         $this->importe= $importe;
    }


      public function getIncluyeMG(){
        return $this->incluyeMG;
    }

    public function setIncluyeMG($incluyeMG){
         $this->incluyeMG= $incluyeMG;
    }
 private function retornarCadenaDesdeColeccion($coleccion){
        $cadena = "\n Cant Equipos: ". count($coleccion)."\n";
        foreach ($coleccion as $unElementoCol) {
            $cadena = $cadena . " " . $unElementoCol . "\n";
        }
        return $cadena;
    }
public function __toString(){
        //string $cadena
        $cadena = "Codigo: ".$this->getCodigo()."\n";
        $cadena = $cadena. "Canales: ".$this->retornarCadenaDesdeColeccion($this->getColCanales())."\n";
        $cadena = $cadena. "Importe: ".$this->getImporte()."\n";
        $cadena = $cadena. "Incluye MG: ".$this->getIncluyeMG()."\n";
 
        return $cadena;
         }
     }