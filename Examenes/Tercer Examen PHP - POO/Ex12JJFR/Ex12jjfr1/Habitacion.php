<?php
/**
 * Clase Habitacion
 *
 * @author Juan Jose Fernandez Romero
 */
class Habitacion {
    
    // Atributos de clase
    private $numeroHab;
    private $tipoHab;
    private $estadoHab;
    private static $totalHab = 0;
    private static $totalHabLibres = 0;
    
    public function __construct($numero, $tipo) {
        $this->numeroHab = $numero;
        $this->tipoHab = $tipo;
        $this->estadoHab = "Libre";
        Habitacion::$totalHab++;
        Habitacion::$totalHabLibres++;
    }
    
    public function getTotalHabitaciones() {
        return Habitacion::$totalHab;
    }
    
    public function getHabitacionesLibres() {
        return Habitacion::$totalHabLibres;
    }
    
    public function reserva() {
        
        if ($this->estadoHab === "Libre") {
            
            $this->estadoHab = "Reservada";
            Habitacion::$totalHabLibres--;
            echo "Reservada con exito<br>";
            
        } else if ($this->estadoHab == "Ocupada") {
            
            echo 'Esta Habitacion ya esta ocupada no se puede reservar<br>';
            
        } else if ($this->estadoHab == "Reservada") {
            
            echo 'Esta Habitacion ya esta reservada, no se puede reservar<br>';
            
        }
    }
    
    public function ocupa() {
        
        if ($this->estadoHab === "Libre") {
            
            $this->estadoHab = "Ocupada";
            Habitacion::$totalHabLibres--;
            echo "Ocupada con exito<br>";
            
        } else if ($this->estadoHab == "Ocupada") {
            
            echo 'Esta Habitacion ya esta ocupada<br>';
            
        } 
    }
    
    public function __toString() {
        
        return "Habitacion nº " . $this->numeroHab . ", " . $this->tipoHab . ", " . $this->estadoHab;
    }
    
    
    
}
