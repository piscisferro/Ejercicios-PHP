<?php

/**
 * Clase abstracta Mamifero que a su vez es una subclase de Animal
 *
 * @author Piscis Ferro
 */

require 'Animal.php';

abstract class Mamifero extends Animal {
    
    // Constructor
    public function __construct($s) {
        parent::__construct($s);
    }
    
    // Funcion hablame de ti
    public function hablameDeTi() {
        return "Soy un mamifero " . parent::hablameDeTi();
    }
    
    // Funcion huevos, para dejar claro que los mamiferos no nacen de huevos
    public function huevos() {
        
        return "Los mamiferos no nacemos de huevos";
        
    }
    
}


