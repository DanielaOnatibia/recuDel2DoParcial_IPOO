<?php

include 'Canal.php';
include 'Contrato.php';
include 'Fecha.php';
include 'Plan.php';
include 'ContratoViaWeb.php';
include 'EmpresaCable.php';
include 'Cliente.php';


// a) Se crea 1 instancia de la clase Empresa_Cable.
$empresa = new EmpresaCable([],[]);

// b) Se crean 3 instancias de la clase Canal.

$canal1 = new Canal("accion",1000,true);
$canal2 = new Canal("ficcion",2000,false);
$canal3 = new Canal("deporte",3000,false);

// c) Se crean 2 instancias de la clase Planes, cada una de ellas con su código propio que hacen referencia a los canales creados anteriormente (uno de los códigos de plan debe ser 111).

$canales = [$canal1,$canal2,$canal3];
$plan1 = new Plan(111,$canales,500,null);

$plan2 = new Plan(222,[$canal1,$canal3],400,100);


// d) Crear una instancia de la clase Cliente

$cliente = new Cliente("juan","rodriguez",42111333,"ed132");
$cliente2 = new Cliente("pedro","sanchez",41222333,"f42jn");
$cliente3 = new Cliente("jose","suarez",43000333,"4non1");

// e) Se crean 3 instancias de Contratos, 1 correspondiente a un contrato realizado en la empresa y 2 realizados via web.

$fechaVencimiento = new Fecha("30","07","2024");
$fechaActual = new Fecha("04","08","2024");
$contrato1 = new Contrato($fechaActual,$fechaVencimiento,$plan2,"al dia",null,$cliente);
$contrato2 = new ContratoViaWeb('25-02-2024',$fechaVencimiento,$plan1,"al dia",null,$cliente2,0.25);
$contrato3 = new ContratoViaWeb('01-01-2024',$fechaVencimiento,$plan2,"al dia",null,$cliente3,0.15);

$colContratos=[$contrato1, $contrato2, $contrato3];

// f) Invocar con cada instancia del inciso anterior al método calcularImporte y visualizar el resultado.
echo $contrato1->calcularImporte()."\n";
echo $contrato2->calcularImporte()."\n";
echo $contrato3->calcularImporte()."\n";

// g) Invocar al método incorporaPlan con uno de los planes creados en c).
if(!($empresa->incorporarPlan($plan1))){
    echo "\nse incorporó";
}else{
    echo "\n no se incorporó";
}; 


// h) Invocar nuevamente al método incorporaPlan de la empresa con el plan creado en c).
if(!($empresa->incorporarPlan($plan1))){
    echo "\nse incorporó";
}else{
    echo "\n no se incorporó";
}; 
echo $empresa;

$colCanales = [$canal1,$canal2];
$plan = new Plan('0002',$colCanales,1200,false);
echo $contrato1->diasContratoVencido();

/*i) Invocar al método incorporarContrato con los siguientes parámetros: uno de los planes creado en c), 
el cliente creado en e), la fecha de hoy para indicar el inicio del contrato, la fecha de hoy más 30 días 
para indicar el vencimiento del mismo y false/true (j) como último parámetro*/

echo  $contrato->incorporarContrato($plan1, $cliente, $fechaActual, $fechaVencimiento, false );
echo  $contrato->incorporarContrato($plan2, $cliente1, $fechaActual, $fechaVencimiento, true );

/*k) Invocar al método pagarContrato que recibe como parámetro uno de los contratos creados en d) y que haya sido contratado en la empresa. */

echo pagarContrato($colContratos)

/*l) Invocar al método pagarContrato que recibe como parámetro uno de los contratos creados en d) y que haya sido contratado vía web.*/


/*m) invoca al método retornarImporteContratos con el código 111 */