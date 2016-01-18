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
        $this->plazas = new SplFixedArray($plazas);
        for ($i = 0; $i < $this->plazasTotales; $i++) {
            $this->plazas[$i] = "Libre";
        }
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
        $resultado = "Zona " . $this->nombre . ": |";
        
        for ($i = 0; $i < $this->plazasTotales; $i++) {
            $resultado .= " " . ($i+1) . ": " . $this->plazas[$i]. " |";
        }
        return $resultado;
    }


    // Funcion para vender entradas
    public function vender($nombre) {
        // For que recorre el array de entradas de la zona
        for ($i = 0; $i < $this->plazasTotales; $i++) {
            // Si el valor actual es igual al nombre que pasamos por parametro la vendemos
            if ($this->plazas[$i] === $nombre) {
                $this->plazas[$i] = "Vendida";
                return true;
            }
        } 
        return false;
    }
    
    // Funcion para Reservar Entradas
    public function reservar($nombre) {
        // For que recorre el array de entradas de la zona
        for ($i = 0; $i < $this->plazasTotales; $i++) {
            // Si el valor actual es igual al nombre que pasamos por parametro la reservamos
            if ($this->plazas[$i] === "Libre") {
                $this->plazas[$i] = $nombre;
                echo $this->plazas[$i];
                return true;
            }
        } 
        return false;
    }
}
