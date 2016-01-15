<?php
/**
 * Clase Bicicleta, subclase de Vehiculos
 *
 * @author Juan Jose Fernandez Romero
 */
require 'Vehiculos.php';

class Bicicleta extends Vehiculos {
    
    // Metodo constructor
    public function __construct() {
        parent::__construct();
    }
    
    // Metodo para hacer el caballito con la bicicleta
    public function caballito() {
        return "Caballitooo!! Estoy mu looOOOcooOOO!"; 
    }    
}
