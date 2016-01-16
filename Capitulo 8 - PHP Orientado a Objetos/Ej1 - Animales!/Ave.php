<?php
/**
 * Clase Abstracta Ave que a su vez es subclase de Animal
 *
 * @author Piscis Ferro
 */

require 'Animal.php';

abstract class Ave extends Animal {
    
    // Constructor que construye con el constructor de la clase padre Animal
    public function __construct($s) {
        parent::__construct($s);
    }
    
    // Funcion hablameDeTi
    public function hablameDeTi() {
        
        return "Soy un ave " . parent::hablameDeTi();
        
    }
    
    // Funcion para asear al ave.
    public function aseate() {
        return "Me limpiare las plumas " . parent::aseate();
    }
    
   // Funcion vuela
    public function vuela() {
        
        return "¡Volando voooy!";
        
    }
    
    
}
