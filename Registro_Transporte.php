<?php

class Registro_Transporte extends RegistroVehiculo {

    private $capacidadMax;
    private $baseTransporte;

    public function __construct(
        $numPatente, 
        $valorBasePeaje, 
        $capacidadMax, 
        $baseTransporte) {
    parent::__construct($numPatente, $valorBasePeaje);
    $this->capacidadMax = $capacidadMax;
    $this->baseTransporte = 25;
}

    public function getCapacidadMax() {
        return $this->capacidadMax;
    }

    public function setCapacidadMax($capacidadMax) {
        $this->capacidadMax = $capacidadMax;
    }

    public function getBaseTransporte() {
        return $this->baseTransporte;
    }

    public function setBaseTransporte($baseTransporte) {
        $this->baseTransporte = $baseTransporte;
    }

public function valorPeaje() {
    $valorBase = parent::valorPeaje();
    $baseTransporte = $this->getBaseTransporte();
    $capacidadMax = $this->getCapacidadMax();
        $total = $valorBase + ($baseTransporte * $capacidadMax);
        return $total;
    }


}