<?php
/**
 * Clase Abstracta Animal.
 *
 * @author Piscis Ferro
 */
abstract class Animal {
    
    // Atributo privado donde guardaremos el sexo del animal
    private $sexo;
    
    // Constructor de la clase Animal
    public function __construct($s) {
        
        $this->sexo = $s;
        
    }
    
    // Funcion que devuelve que es un animal
    public function hablameDeTi() {
        
        return "soy un Animal y soy " . $this->sexo;
        
    }
    
    // Funcion para que devuelve que el animal se esta aseando
    public function aseate() {
        
        return "A los animales nos gusta estar aseados";
        
    }
    
    // Funcion para que devuelve que el animal esta jugando
    public function juega() {
        
        return "¡A los animales nos gusta jugar!";
        
    }
    
    
}
