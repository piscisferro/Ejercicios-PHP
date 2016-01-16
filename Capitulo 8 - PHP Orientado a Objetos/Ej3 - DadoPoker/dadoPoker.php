<?php
/**
 * Ejercicio 3
 * 
 * Crea la clase DadoPoker. Las caras de un dado de poker tienen las siguientes figuras: As, K, Q, J,
 * 7 y 8 . Crea el método tira() que no hace otra cosa que tirar el dado, es decir, genera un valor
 * aleatorio para el objeto al que se le aplica el método. Crea también el método nombreFigura(), que
 * diga cuál es la figura que ha salido en la última tirada del dado en cuestión. Crea, por último, el
 * método getTiradasTotales() que debe mostrar el número total de tiradas entre todos los dados.
 * Realiza una aplicación que permita tirar un cubilete con cinco dados de poker.
 *
 * @author Juan Jose Fernandez Romero
 */
class DadoPoker {
    
    // Guardamos de manera estatica las tiradas totales
    private $tiradasTotales = 0;
    
    // Atributo caras que contendra las caras del dado
    private static $caras = array("As", "K", "Q", "J", "7", "8");
    
    // Atributo donde guardamos la ultima tirada
    private $ultimaTirada;
    
    
    // Constructor
    public function __construct() {
        
        $this->ultimaTirada = "¡Aun no se ha tirado!";
        
    }
    
    // Funcion tira 
    public function tira() {
        
        // Generamos un valor aleatorio entre 0 y 5
        $tirada = mt_rand(0, 5);
        
        // Guardamos lo que haya salido en $ultimaTirada
        $this->ultimaTirada = DadoPoker::$caras[$tirada];
        
        // Incrementamos las tiradas totales
        $this->tiradasTotales++;
        
    }
    
    // Funcion que devuelve la ultima figura que ha salido en el dado
    public function nombreFigura() {
        
        return $this->ultimaTirada;
        
    }


    // Funcion getter para recoger el numero de tiradas totales.
    public function getTiradasTotales() {
        
        return $this->tiradasTotales;
        
    }
    
    
}
