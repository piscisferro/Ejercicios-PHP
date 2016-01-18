<?php
/**
 * Clase Carta
 *
 * @author Juan Jose Fernandez Romero
 */
class Carta {
    
    // Atributos
    private $carta;
    private $palo;
    private $puntos;
    private static $puntosBaraja = array ( 'As' => 11, 'Dos' => 0, 'Tres' => 10, 'Cuatro' => 0, 'Cinco' => 0,
                                            'Seis' => 0, 'Siete' => 0, 'Sota' => 2, 'Caballo' => 3, 'Rey' => 4);
    private static $paloBaraja = ['Oros', 'Bastos', 'Espadas', 'Copas'];
    private static $cartasBaraja = ['As', 'Dos', 'Tres', 'Cuatro', 'Cinco', 'Seis', 'Siete', 'Sota', 'Caballo', 'Rey'];
    
    private static $puntosTotales = 0;


    public function __construct() {
        
        $this->carta = Carta::$cartasBaraja[rand(0, 9)];
        $this->palo = Carta::$paloBaraja[rand(0, 3)]; 
        $this->puntos = Carta::$puntosBaraja[$this->carta];
        Carta::$puntosTotales += $this->puntos;
    }
    
    public function __toString() {
        return "$this->carta de $this->palo: $this->puntos puntos.";
    }
    
    public function getPuntosTotales() {
        
        return Carta::$puntosTotales;
        
    }
    
    
}

