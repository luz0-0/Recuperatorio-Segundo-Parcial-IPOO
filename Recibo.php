<?php

class Recibo {

private $numRecibo;
private $valorRecibo;
private DateTime $fechaRecibo;
private DateTime $horaRecibo;
private $objVehiculo;

public function __construct(
    $numRecibo, 
    $valorRecibo,
    dateTime $fechaRecibo, 
    dateTime $horaRecibo, 
    $objVehiculo
    ) {
    $this->numRecibo = $numRecibo;
    $this->valorRecibo = $valorRecibo;
    $this->fechaRecibo = $fechaRecibo;
    $this->horaRecibo = $horaRecibo;
    $this->objVehiculo = $objVehiculo;
}

public function getNumRecibo() {
    return $this->numRecibo;
}

public function getValorRecibo() {
    return $this->valorRecibo;
}

public function getFechaRecibo() {
    return $this->fechaRecibo;
}

public function getHoraRecibo() {
    return $this->horaRecibo;
}

public function getObjVehiculo() {
    return $this->objVehiculo;
}

public function setNumRecibo($numRecibo) {
    $this->numRecibo = $numRecibo;
}

public function setValorRecibo($valorRecibo) {
    $this->valorRecibo = $valorRecibo;
}

public function setFechaRecibo(dateTime $fechaRecibo) {
    $this->fechaRecibo = $fechaRecibo;
}

public function setHoraRecibo(dateTime $horaRecibo) {
    $this->horaRecibo = $horaRecibo;
}

public function setObjVehiculo($objVehiculo) {
    $this->objVehiculo = $objVehiculo;
}

public function __toString() {
    return "Recibo No: {$this->numRecibo}, Valor: {$this->valorRecibo}, Fecha: {$this->fechaRecibo->format('Y-m-d')}, Hora: {$this->horaRecibo->format('H:i:s')}, Vehiculo: {$this->objVehiculo}";
}



}