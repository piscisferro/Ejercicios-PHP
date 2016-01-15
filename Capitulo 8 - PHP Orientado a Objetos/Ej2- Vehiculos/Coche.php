<?php
/**
 * Clase Coche, subclase de Vehiculos
 *
 * @author Juan Jose Fernandez Romero
 */
require 'Vehiculos.php';

class Coche extends Vehiculos {
    
    // Metodo constructor
    public function __construct() {
        parent::__construct();
    }
    
    // Metodo para quemar ruedas con el coche
    public function quemandoRuedas() {
        return "Quemando ruedas!!";
    }
    
    
}
