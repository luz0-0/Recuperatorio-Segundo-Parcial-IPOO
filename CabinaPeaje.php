<?php

class CabinaPeaje {
    private $colRegistrosVehiculos; 
    private $colRecibos;

    public function __construct() {
        $this->colRegistrosVehiculos = [];
        $this->colRecibos = [];
    }

    public function getColRegistrosVehiculos() {
        return $this->colRegistrosVehiculos;
    }

    public function getColRecibos() {
        return $this->colRecibos;
    }

    public function setColRegistrosVehiculos($colRegistrosVehiculos) {
        $this->colRegistrosVehiculos = $colRegistrosVehiculos;
    }

	public function setColRecibos($colRecibos) {
        $this->colRecibos = $colRecibos;
    }

    public function cobrarPeaje($unTipoRegistroVehiculo, $info) {
        $registro = null;
        $tipoVehiculo = ['transporte', 'camion', 'vehiculo'];
        $i = 0;
        $encontrado = false;

        while ($i < count($tipoVehiculo) && !$encontrado) {
            if ($unTipoRegistroVehiculo === $tipoVehiculo[$i]) {
                $encontrado = true;
            } else {
                $i++;
            }
        }

        if ($encontrado) {
            if ($unTipoRegistroVehiculo === 'transporte') {
                $registro = new Registro_Transporte(
                    $info['numPatente'],
                    $info['valorBasePeaje'],
                    $info['capacidadMax'],
                    $info['baseTransporte']
                );
            } elseif ($unTipoRegistroVehiculo === 'camion') {
                $registro = new RegistroCamiones(
                    $info['numPatente'],
                    $info['valorBasePeaje'],
                    $info['pesoCamion'],
                    $info['numEjes']
                );
            } else {
                $registro = new RegistroVehiculo(
                    $info['numPatente'],
                    $info['valorBasePeaje']
                );
            }
        }

        $valorPeaje = $registro->valorPeaje();
        $fecha = new DateTime();
        $hora = new DateTime();
        $recibo = new Recibo(
            $info['numRecibo'],
            $valorPeaje,
            $fecha,
            $hora,
            $registro
        );

        return $recibo;
    }

public function reciboMayorMonto($fecha) {
        $mayorRecibo = null;
        $mayorValor = -1;
        $i = 0;
        $colRecibos = $this->getColRecibos();
        $cant = count($colRecibos);

        while ($i < $cant) {
            $recibo = $colRecibos[$i];
            if ($recibo->getFechaRecibo()->format('Y-m-d') == $fecha) {
                if ($recibo->getValorRecibo() > $mayorValor) {
                    $mayorValor = $recibo->getValorRecibo();
                    $mayorRecibo = $recibo;
                }
            }
            $i++;
        }

        return $mayorRecibo;
    }

    public function recaudacionXTipoVehiculo($fecha, $tipoRegistroVehiculo) {
        $recaudacionTotal = 0;
        $i = 0;
        $colRecibos = $this->getColRecibos();
        $cant = count($colRecibos);

        while ($i < $cant) {
            $recibo = $colRecibos[$i];
            $fechaRecibo = $recibo->getFechaRecibo()->format('Y-m-d');
            $objVehiculo = $recibo->getObjVehiculo();
            $claseVehiculo = get_class($objVehiculo);

            if ($fechaRecibo == $fecha && $claseVehiculo == $tipoRegistroVehiculo) {
                $recaudacionTotal += $recibo->getValorRecibo();
            }
            $i++;
        }

        return $recaudacionTotal;
    }
	
    public function totalRecaudado($fecha) {
        $total = 0;
        $i = 0;
        $colRecibos = $this->getColRecibos();
        $cant = count($colRecibos);

        while ($i < $cant) {
            $recibo = $colRecibos[$i];
            $fechaRecibo = $recibo->getFechaRecibo()->format('Y-m-d');
            if ($fechaRecibo == $fecha) {
                $total += $recibo->getValorRecibo();
            }
            $i++;
        }

        return $total;
    }

 public function __toString()
    {
        return
        "\nInformación de la Cabina de Peaje: \n" .
        "\n--------------------------------\n" .
        "Colección de Recibos: \n" . $this->mostrarColeccion($this->colRecibos);
    }

    private function mostrarColeccion($coleccion)
    {
        $cadena = "";
        foreach ($coleccion as $item) {
            $cadena .= $item . "\n";
        }
        return $cadena;
    }
}