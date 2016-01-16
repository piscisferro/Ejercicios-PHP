<?php

/**
 * Clase Lagarto que a su vez es una subclase de Animal
 *
 * @author Piscis Ferro
 */
require 'Animal.php';

class Lagarto extends Animal {
    
    // Constructor
    public function __construct($s) {
        parent::__construct($s);
    }
    
    // Funcion hablame de ti
    public function hablameDeTi() {
        return "Soy un lagarto " . parent::hablameDeTi();
    }
    
    // Funcion aseate
    public function aseate() {
        return "No necesito asearme, soy un Lagarto";
    }
    
    // Funcion Come
    public function come($comida) {
        // Si la comida son bichos
        if ($comida == "Bichos") {
            return "Que rico!";
        } else { // Si no son bichos respondera que solo come bichos
            return "Solo como bichos";
        }
    }
    
}
