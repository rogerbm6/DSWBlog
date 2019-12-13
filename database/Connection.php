<?php
require_once 'exceptions/AppException.php';
  /**
   *
   */
  class Connection
  {
    /**
     * make --> Construye una conexion a una base de datos
     * @param  Array $config array con la configuracion de la BBDD
     * @return coneccion  devuelve una variable que es la conexión
     */
    public static function make()
    {

      try {
        $config = App::get("config")["database"];

        $connection = new PDO(
          $config['connection'].";dbname=".$config['name'],
          $config['username'],
          $config['password'],
          $config['options']);
        //contruye esto --> ('mysql:host=localhost;port=3306;dbname=fotografia', 'roger', '12345r', $opciones)

      } catch (AppException $e) {

        die($e->getMessage());
      }

      return $connection;
    }
  }

 ?>
