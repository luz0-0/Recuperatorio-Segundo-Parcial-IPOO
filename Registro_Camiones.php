<?php

class RegistroCamiones extends RegistroVehiculo {
    private $pesoCamion;
    private $numEjes;
    private $valorPorEje;
    private $valorPorTonelada;

    public function __construct(
        $numPatente, 
        $valorBasePeaje, 
        $pesoCamion, 
        $numEjes
    ) {
        parent::__construct($numPatente, $valorBasePeaje);
        $this->pesoCamion = $pesoCamion;
        $this->numEjes = $numEjes;
        $this->valorPorEje = 100;
        $this->valorPorTonelada = 15;
}

    public function getPesoCamion() {
        return $this->pesoCamion;
    }

    public function getNumEjes() {
        return $this->numEjes;
    }

    public function setPesoCamion($pesoCamion) {
        $this->pesoCamion = $pesoCamion;
    }

    public function setNumEjes($numEjes) {
        $this->numEjes = $numEjes;
    }

      public function getValorPorEje() {
        return $this->valorPorEje;
    }

    public function getValorPorTonelada() {
        return $this->valorPorTonelada;
    }

    
   private function pesoEnToneladas() {
    $pesoCamion = $this->getPesoCamion();
    $toneladas = $this->getPesoCamion() / 1000;
    return $toneladas;
}


    public function valorPeaje() {
    $valorBase = parent::valorPeaje();
    $valorPorEje = $this->getValorPorEje();
    $valorPorTonelada = $this->getValorPorTonelada();
    $toneladas = $this->pesoEnToneladas();
    $subtotal = $valorBase + ($this->getNumEjes() * $valorPorEje) + ($toneladas * $valorPorTonelada);

    if ($toneladas < 5) {
        $impuesto = 0.02;
    } else {
        $impuesto = 0.05;
    }

    $total = $subtotal + ($subtotal * $impuesto);

    return $total;
}


    public function __toString() {
        return "Patente: " . $this->getNumPatente() . 
               ", Peso: " . $this->getPesoCamion() . 
               " kg, Ejes: " . $this->getNumEjes() . 
               ", Valor Base Peaje: " . $this->getValorBasePeaje();
    }
}