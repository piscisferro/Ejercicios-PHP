<?php
// Clase abstracta blogDB
abstract class blogDB {
    // Atributos estaticos con la informacion de la conexion
    private static $server = 'localhost';
    private static $db = 'blogejercicio';
    private static $user = 'root';
    private static $password = '';

    // Funcion estatica para conectar con al base de datos
    public static function connectDB() {
        try {
          $connection = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";charset=utf8", self::$user, self::$password);
        } catch (PDOException $e) {
          echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
          die ("Error: " . $e->getMessage());
        }

        return $connection;
    }
}
