<?php
require_once 'core/App.php';
/**
 *
 */
class App
{
//almacena objetos en contenedor
  private static $container = [];

//setter de un valor
  public static function bind(string $key, $value)
  {
    static::$container[$key] = $value;
  }
  //getter de un valor
  public static function get(string $key)
  {
    if (!array_key_exists($key, static::$container))
      throw new AppException("No se ha encontrado la clave $key en el contenedor.");
    return static::$container[$key];
  }

  //getter de conexion
  public static function getConnection()
  {
    if (!array_key_exists("connection", static::$container))
      static::$container["connection"] = Connection::make();
    return static::$container["connection"];

  }

}


 ?>
