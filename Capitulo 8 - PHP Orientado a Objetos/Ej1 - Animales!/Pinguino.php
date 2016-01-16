<?php

/**
 * Clase Pinguino que es subclase de Ave y Animal
 *
 * @author Piscis Ferro
 */

require 'Ave.php';

class Pinguino extends Ave {
    
    // Constructor de la clase Canario
    public function __construct($s) {
        parent::__construct($s);
    }
    
    // Funcion hablame de ti
    public function hablameDeTi() {
        return "Soy un Pinguino " . parent::hablameDeTi();
    }
    
    // Funcion canta
    public function canta() {
        return "No se cantar :(";
    }
    
    // Funcion vuela
    public function vuela() {
        return "Que gracioso! Ja ja...! Los pinguinos no podemos volar ¬¬";
    }
    
    // Funcion Juega
    public function juega() {
        return "A los pinguinos nos encanta jugar";
    }
    
}
