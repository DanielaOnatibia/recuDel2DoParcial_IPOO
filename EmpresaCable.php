<?php

class EmpresaCable{

    private $colObjPlanes;
    private $colObjContratos;

    public function __construct($colObjPlanes,$colObjContratos)
    {
        $this->colObjPlanes = $colObjPlanes;
        $this->colObjContratos = $colObjContratos;
    }

    public function getColObjPlanes(){
        return $this->colObjPlanes;
    }

    public function setColObjPlanes($colObjPlanes){
        $this->colObjPlanes = $colObjPlanes;
    }

    public function getColObjContratos(){
        return $this->colObjContratos;
    }

    public function setColObjContratos($colObjContratos){
        $this->colObjContratos = $colObjContratos;
    }

/* incorporarPlan($objPlan): que incorpora a la colección de planes un nuevo plan siempre y cuando no haya un plan con los mismos canales y los mismos MG (en caso de que el plan incluyera)*/
public function incorporarPlan($nuevoPlan){
        
    $i = 0;
    $mismosCanalesYMG = false;
    while($i < count($this->getColObjPlanes()) && !$mismosCanalesYMG){
        $canalesPlan = $this->getColObjPlanes()[$i]->getColObjCanales();
        $MGPlan = $this->getColObjPlanes()[$i]->getIncluyeMG();
        if($nuevoPlan->getIncluyeMG() != null){

            if((in_array($nuevoPlan->getColObjCanales(),$canalesPlan)) && ($nuevoPlan->getIncluyeMG() == $MGPlan)){
                $mismosCanalesYMG = true;
            }
            $i++;
        }
    }
    if(!$mismosCanalesYMG){
        $planes = $this->getColObjPlanes();
        $planes[] = $nuevoPlan;
        $this->setColObjPlanes($planes);
    }
    return !$mismosCanalesYMG;
}

/* incorporarContrato ($objPlan,$objCliente,$fechaDesde,$fechaVenc,$esViaWeb): método  que recibe por parámetro el plan, una referencia al cliente, la fecha de inicio y de vencimiento del mismo y si se trata de un contrato realizado en la empresa o via web (si el valor del parámetro es True se trata de un contrato realizado via web). */
public function incorporarContrato($objPlan,$objCliente,$fechaInicio,$fechaVencimiento,$tipoContrato){
    $planIncorporado = $this->incorporarPlan($objPlan); 
    if(!$planIncorporado){
        if($tipoContrato){

            $nuevoContrato = new ContratoViaWeb($fechaInicio,$fechaVencimiento,$objPlan,"al dia",null,$objCliente,null);
        }else{
            $nuevoContrato = new Contrato($fechaInicio,$fechaVencimiento,$objPlan,"al dia",null,$objCliente);
        }
    }
    $contratos = $this->getColObjContratos();
    $contratos[] = $nuevoContrato;
    $this->setColObjContratos($contratos);
    return $planIncorporado; 
}

/*retornarImporteContratos ($codigoPlan) : método que recibe por parámetro el código de un plan y retorna la suma de los importes de los contratos realizados usando ese plan.*/
public function retornarImporteContratos($codigoPlan){

    $contratos = $this->getColObjContratos();
    $importeContratos = 0;
    foreach($contratos as $contrato){
        if($contrato->getObjPlan()->getCodigo() == $codigoPlan){
            $importeContratos += $contrato->calcularImporte();
        }
    }
    return $importeContratos;
}


/*pagarContrato ($objContrato): método recibe como parámetro un contrato, actualiza su estado y retorna el importe final que debe ser abonado por el cliente */

public function pagarContrato($contrato){
    $estado = $contrato->getEstado();
    if(strcasecmp($estado,"al dia")==0){
        $importeFinal = $contrato->calcularImporte();
        $contrato->setRenovacion(true);

    }elseif(strcasecmp($estado,"moroso")==0){
        
        $importeFinal = ($contrato->calcularImporte() * 1.1) * $contrato->diasContratoVencido();
        $contrato->setRenovacion(true);
        #seteo la fecha de vencimiento a la de hoy para que los dias de mora me den cero. 
        $contrato->setObjFechaVencimiento(date('d-m-Y'));
        if($contrato->diasContratoVencido()){
            $contrato->actualizarEstadoContrato();
        }
    }else{
        $importeFinal = ($contrato->calcularImporte() * 1.1) * $contrato->diasContratoVencido();
        $contrato->setRenovacion(false);
    }
    return $importeFinal;
}


}

?>