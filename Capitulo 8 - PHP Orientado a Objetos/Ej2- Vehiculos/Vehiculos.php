<?php
/**
 * Clase abstracta vehiculos
 *
 * @author Juan Jose Fernandez Romero
 */
abstract class Vehiculos {
    
    // Atributo estatico de vehiculos creados
    private static $vehiculosCreados = 0;
    // Atributo estatico Kilometraje Total
    private static $kmTotales = 0;
    // Atributo Kms recorridos
    private $kmRecorridos;
   
    // Metodo Constructor
    public function __construct() {
        $this->kmRecorridos = 0;
        $this->vehiculosCreados++;
    }
    
    // Metodo que devuelve la cantidad de vehiculos creados
    public function getVehiculosCreados() {
        return Vehiculos::$vehiculosCreados;
    }
    
    // Metodo que devuelve los kms totales de todos los vehiculos
    public function getKmTotales() {
        return Vehiculos::$kmTotales;
    }
    
    // Metodo que devuelve los KmRecorridos por el vehiculo en cuestion
    public function getKmRecorridos() {
        return $this->kmRecorridos;
    }
    
    // Metodo para añadir kms a los km recorridos y totales
    public function addKm($kms) {
        $this->kmTotales += $kms;
        $this->kmRecorridos += $kms;
    }
}
