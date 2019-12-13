<?php
/**
 *Request
 *Devuelve el path de la url, el cual es el fichero en que se encuentra
 */
class Request
{
  public static function uri()
  {
    return trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
  }
}

 ?>
