<?php

require_once 'RegistroVehiculo.php';
require_once 'Registro_Camiones.php';
require_once 'Registro_Transporte.php';
require_once 'Recibo.php';
require_once 'CabinaPeaje.php';

$cabina = new CabinaPeaje();

$scania = new RegistroCamiones("123A", 500, 10000, 4);
$trafic = new Registro_Transporte("123B", 300, 15, 30);
$corolla = new RegistroVehiculo("123C", 200);

echo "Valor peaje scania: " . $scania->valorPeaje() . "\n";
echo "Valor peaje trafic: " . $trafic->valorPeaje() . "\n";
echo "Valor peaje toyota Corolla: " . $corolla->valorPeaje() . "\n";




// Invocar al método cobrarPeaje() y visualizar el resultado
$infoScania = [
    'numPatente' => "LH44",
    'valorBasePeaje' => 20,
    'pesoCamion' => 10000,
    'numEjes' => 7,
    'numRecibo' => 44
];
$reciboScania = $cabina->cobrarPeaje('camion', $infoScania);
echo "Recibo Scania:\n" . $reciboScania . "\n";

// Agregar el recibo a la colección de la cabina
$cabina->setColRecibos([$reciboScania]);

// Puedes agregar más recibos para la misma fecha si quieres probar los otros métodos:
$infoTrafic = [
    'numPatente' => "NR6",
    'valorBasePeaje' => 20,
    'capacidadMax' => 60,
    'baseTransporte' => 6,
    'numRecibo' => 6
];
$reciboTrafic = $cabina->cobrarPeaje('transporte', $infoTrafic);

$infoCorolla = [
    'numPatente' => "SV5",
    'valorBasePeaje' => 20,
    'numRecibo' => 5
];
$reciboCorolla = $cabina->cobrarPeaje('vehiculo', $infoCorolla);

// Agregar todos los recibos a la colección
$cabina->setColRecibos([$reciboScania, $reciboTrafic, $reciboCorolla]);


// Invocar al método reciboMayorMonto("2024-06-15") y visualizar el resultado
$fecha = "2024-06-15";
$mayorRecibo = $cabina->reciboMayorMonto($fecha);
echo "Recibo de mayor monto para $fecha:\n";
if ($mayorRecibo !== null) {
    echo $mayorRecibo . "\n";
} else {
    echo "No hay recibos para esa fecha.\n";
}

// Invocar al método totalRecaudado("2024-06-15") y visualizar el resultado
$total = $cabina->totalRecaudado($fecha);
echo "Total recaudado para $fecha: $total\n";