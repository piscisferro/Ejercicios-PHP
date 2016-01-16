<?php
/**
 * Clase Canario que es subclase de Ave y Animal
 *
 * @author Piscis Ferro
 */

require 'Ave.php';

class Canario extends Ave {
    
    // Constructor de la clase Canario
    public function __construct($s) {
        parent::__construct($s);
    }
    
    // Funcion hablame de ti
    public function hablameDeTi() {
        return "Soy un Canario " . parent::hablameDeTi();
    }
    
    // Funcion canta
    public function canta() {
        return "Me gusta cantar, canto muy bien! pio pio!";
    }
    
    // Funcion vuela
    public function vuela() {
        return "¡Me encanta volar! " . parent::vuela();
    }
    
    
}
