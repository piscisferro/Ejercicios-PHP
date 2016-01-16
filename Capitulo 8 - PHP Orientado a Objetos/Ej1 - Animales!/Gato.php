<?php

/**
 * Clase Gato que a su vez es una subclase de Mamifero y Animal
 *
 * @author Piscis Ferro
 */
require 'Mamifero.php';

class Gato extends Mamifero {
    
    private $raza;
    
    // Constructor
    public function __construct($s, $r) {
        parent::__construct($s);
        
        // Guardamos la raza en el atributo raza si esta puesto
        if (isset($r)) {
            $this->raza= $r;
        } else { // Si la raza no se ha especificado ponemos un string arbitrario
            $this->raza= "No se de que raza soy :( ";
        }
    }
        
    // Funcion Hablame De ti
    public function hablameDeTi() {
        return "Soy un Gato " . $this->raza . parent::hablameDeTi();
    }
    
    // Funcion Juega
    public function juega() {
        return "Espera... luego voy, luego...";
    }
    
    // Funcion maulla
    public function maulla() {
        return "...";
    }
        
    
    
}
