<?php
/**
 * Clase blogArticulo, en este clase tendremos todo lo relacionado con la carga y
 * obtencion de datos de los articulos del post en la base de datos.
 *
 * @author Juan Jose Fernandez Romero
 */
require_once "blogDB.php";

class Articulo {
    
    // Atributos del articulo
    private $id;
    private $titulo;
    private $articulo;
    private $autor;
    private $tags;
    private $fecha;
    
    // Funcion constructor que inicializa los atributos
    public function __construct($titulo, $articulo, $autor, $fecha, $tags = "", $id = null) {
        $this->titulo = $titulo;
        $this->articulo = $articulo;
        $this->autor = $autor;
        $this->tags = $tags;
        $this->fecha = $fecha;
        $this->id = $id;
    }
    
    // Funcion getId
    public function getId() {
        return $this->id;
    }
    
    // Funcion getTitulo
    public function getTitulo() {
        return $this->titulo;
    }
    
    // Funcion getArticulo
    public function getArticulo() {
        return $this->articulo;
    }
    
    // Funcion getAutor
    public function getAutor() {
        return $this->autor;
    }
    
    // Funcion getFecha
    public function getFecha() {
        return $this->fecha;
    }
    
    // Funcion getTags
    public function getTags() {
        return $this->tags;
    }
    
    // Funcion insert que inserta un nuevo objeto a la base de datos
    public function insert() {
        // Establecemos conexion con la BD
        $conexion = blogDB::ConnectDB();
        
        // Sentencia Insert
        $insert = "INSERT INTO articulos (titulo, articulo, autor, fecha, tags) VALUES (\"".
          "$this->titulo\", \"$this->articulo\", \"$this->autor\", STR_TO_DATE(\"$this->fecha\", '%d-%m-%Y %H:%i'),".
          "\"$this->tags\")";
        
        // Ejecutamos la sentencia
        $conexion->exec($insert);
    }
    
    // Funcion delete que borra objeto a la base de datos
    public function delete() {
        // Establecemos conexion con la BD
        $conexion = blogDB::connectDB();
        
        // Sentencia para borrar el objeto
        $borrado = "DELETE FROM articulos WHERE id=\"".$this->id."\"";
        
        // Ejecutamos la sentencia
        $conexion->exec($borrado);
    }
    
    // Funcion estatica de clase para seleccionar todos los articulos de la tabla devuelve un array de objetos
    public static function getArticulos() {
    // Conectamos a la BD
    $conexion = blogDB::connectDB();
    
    // Sentencia Select
    $seleccion = "SELECT id, titulo, articulo, autor, fecha, tags FROM articulos ORDER BY fecha DESC";
    
    // Ejecutamos el Select con query (que devuelve los datos, exec solo devuelve filas afectadas)
    $consulta = $conexion->query($seleccion);
    
    // Inicializamos $articulos como array antes del While para evitar error
    $articulos = [];
    
    // Recorremos todos los registros
    while ($registro = $consulta->fetchObject()) {
      // Creamos objetos y los metemos en el array articulos
      $articulos[] = new Articulo($registro->titulo, $registro->articulo, $registro->autor, 
        $registro->fecha, $registro->tags, $registro->id);
    }
    
    // Devolvemos el array articulos
    return $articulos;    
  }
  
  // Funcion estatica de clase para seleccionar un articulo por su ID, devuelve un objeto
  public static function getArticuloById($id) {
    // Conectamos a la BD
    $conexion = blogDB::connectDB();
    
    // Sentencia Select
    $seleccion = "SELECT id, titulo, articulo, autor, fecha, tags FROM articulos WHERE id=$id";
    
    // Ejecutamos la sentencia SELECT
    $consulta = $conexion->query($seleccion);
    
    // Convertimos en objeto la fila recibida
    $registro = $consulta->fetchObject();
    
    // Guardamos el articulo
    $articulos = new Articulo($registro->titulo, $registro->articulo, $registro->autor, 
        $registro->fecha, $registro->tags, $registro->id);
       
    // Devolvemos el array articulos
    return $articulos;   
  }
    
}
