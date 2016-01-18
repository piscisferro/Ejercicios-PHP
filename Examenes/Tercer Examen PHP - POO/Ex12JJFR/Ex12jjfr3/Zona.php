<?php
/**
 * Clase zona donde tendremos el numero de entradas y los metodos de Zona
 *
 * @author Juan Jose Fernandez Romero
 */
class Zona {
    
    // Nombre de la zona
    private $nombre;
    
    // Numero de plazas totales (este numero no cambia)
    private $plazasTotales;
    
    // Numero de plazas restantes
    private $plazas;
    
    // Metodo para construir el objeto
    public function __construct($nombre, $plazas) {
    
        // Asignamos el nombre como atributo
        $this->nombre = $nombre;
        
        // Asignamos el numero de plazas como atributo
        $this->plazasTotales = $plazas;
        
        // Asignamos el numero de plazas como atributo
        $this->plazas = $plazas;
        
    }
    
    // Funcion para recoger el nombre
    public function getNombre() {
        return $this->nombre;
    }
    
    // Funcion para recoger el numero de plazas totales
    public function getPlazasTotales() {
        return $this->plazasTotales;
    }
    // Funcion para recoger la cantidad de plazas restantes
    public function getPlazasRestantes() {
        return $this->plazas;
    }
    
    // Funcion toString
    public function __toString() {
        return "Zona " . $this->getNombre() . ": " . $this->getPlazasRestantes() . " de " . $this->getPlazasTotales() . " entradas.";
    }


    // Funcion para vender entradas
    public function vender($numero) {
        
        // Si el numero de entradas es menor o igual que las entradas restantes
        if ($numero <= $this->plazas) {
            // Les restamos el numero de entradas vendidas a las plazas restantes
            $this->plazas -= $numero;
            
            // Devolvemos true para confirmar la transaccion
            return true;
        } 
        // En el caso de que no se hayan vendido las entradas (porque el numero sea mayor
        // que las plazas restantes) devolvemos false para notificarlo
        return false;
    }
}
