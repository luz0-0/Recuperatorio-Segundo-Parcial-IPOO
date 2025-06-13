<?php

class RegistroVehiculo {

private $numPatente;
private $valorBasePeaje;

    public function __construct(
        $numPatente, 
        $valorBasePeaje
        ) {
        $this->numPatente = $numPatente;
        $this->valorBasePeaje = $valorBasePeaje;
    }

public function getNumPatente() {
    return $this->numPatente;
}

public function getValorBasePeaje() {
    return $this->valorBasePeaje;
}

public function setNumPatente($numPatente) {
    $this->numPatente = $numPatente;
}

public function setValorBasePeaje($valorBasePeaje) {
    $this->valorBasePeaje = $valorBasePeaje;
}

public function valorPeaje() {
$valorBase = $this->getValorBasePeaje();
return $valorBase;


}


}

