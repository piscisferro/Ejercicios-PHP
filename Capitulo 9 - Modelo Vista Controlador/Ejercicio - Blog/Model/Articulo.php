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
    public function __construct($titulo, $articulo, $autor, $fecha, $id=null, $tags = "") {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->articulo = $articulo;
        $this->autor = $autor;
        $this->fecha = $fecha;
        $this->tags = $tags;
    }
    
    public function getTitulo() {
        return $this->titulo;
    }
    
    public function getArticulo() {
        return $this->articulo;
    }
    
    public function getAutor() {
        return $this->autor;
    }
    
    public function getFecha() {
        return $this->fecha;
    }
    
    public function getTags() {
        return $this->tags;
    }
    
    public function insert() {
        // Establecemos conexion con la BD
        $conexion = blogDB::ConnectDB();
        
        // Formateamos la fecha para su posterior insercion en SQL
        $fechaSQL = "STR_TO_DATE($this->fecha, '%d-%m-%Y %H:%i')";
        
        // Sentencia Insert
        $insert = "INSERT INTO articulos (titulo, articulo, autor, fecha, tags) VALUES (\"" .
          "$this->titulo\", \"$this->articulo\", \"$this->autor\", $fechaSQL, \"$this->tags\")";
        
        // Ejecutamos la sentencia
        $conexion->exec($insert);
    }
    
    public function delete() {
        // Establecemos conexion con la BD
        $conexion = blogDB::connectDB();
        
        $borrado = "DELETE FROM articulos WHERE id=\"".$this->id."\"";
        $conexion->exec($borrado);
    }
    
    public static function getArticulos() {
    // Conectamos a la BD
    $conexion = blogDB::connectDB();
    
    // Sentencia Select
    $seleccion = "SELECT id, titulo, articulo, autor, fecha, tags FROM articulos";
    
    // Ejecutamos el Select con query (que devuelve los datos, exec solo devuelve filas afectadas)
    $consulta = $conexion->query($seleccion);
    
    // Inicializamos $articulos como array antes del While para evitar error
    $articulos = [];
    
    // Recorremos todos los registros
    while ($registro = $consulta->fetchObject()) {
      // Creamos objetos y los metemos en el array articulos
      $articulos[] = new Articulo($registro->titulo, $registro->articulo, $registro->autor, 
        $registro->fecha, $registro->id, $registro->tags);
    }
    
    // Devolvemos el array articulos
    return $articulos;    
  }
  
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
        $registro->fecha, $registro->id, $registro->tags);
       
    // Devolvemos el array articulos
    return $articulos;   
  }
    
}
