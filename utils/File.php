<?php

require_once 'exceptions/FileException.php';

  class File
  {
    private $file;
    private $fileName;


    function __construct(string $fileName, array $arrTypes)
    {
      $this->file = $_FILES[$fileName];

      $this->fileName = "";


      if (!isset($this->file)) {
        var_dump($_FILES);
        throw new FileException("Tienes que elegir un archivo", 1);

      }

      if ($this->file["error"] !== UPLOAD_ERR_OK) {
        switch ($this->file["error"]) {
          case UPLOAD_ERR_INI_SIZE:

          case UPLOAD_ERR_FORM_SIZE:
            throw new FileException("Tienes que elegir una imagen con el tamaño adecuado", 1);
          case UPLOAD_ERR_PARTIAL:

          throw new FileException("El archivo no está completo", 1);

          default:
            throw new FileException("Error al subir el archivo", 1);
            break;
        }
      }

      if (in_array($this->file["type"], $arrTypes)===FALSE) {
        throw new FileException("Tienes que elegir un archivo con el formato adecuado", 1);
      }
    }

    public function getFileName()
    {
      return $this->fileName;
    }

    public function saveUploadFile($ruta)
    {//comprueba que el archivo exista
      if (is_uploaded_file($this->file['tmp_name'])===FALSE)
      {
        throw new FileException("El archivo no fué subido mediante un formulario", 1);
      }
      //ruta en la que se quiere guardar
      $rutaDos = $ruta.$this->file['name'];
      //compruebaque el archivo no esté duplicado y cambia el nombre
      if (is_file($rutaDos)===TRUE)
      {
        //se crea id unico con la hora actual
        $idUnico = time();
        $this->file['name'] = $idUnico."_".$this->file['name'];
        $rutaDos = $ruta.$this->file['name'];
      }
      $this->fileName = $this->file['name'];

      if (move_uploaded_file($this->file['tmp_name'], $rutaDos)===FALSE) {
        throw new FileException("No se ha podido mover el archivo a la ruta especificada", 1);
      }

    }

    public function copyFile($rutaOrigen, $rutaDestino)
    {
      $rutaOrigen = $rutaOrigen.$this->file['name'];
      $rutaDestino = $rutaDestino.$this->file['name'];

      if (is_file($rutaOrigen)===FALSE)
      {
        throw new FileException("No existe el fichero $rutaOrigen", 1);
      }
      if (is_file($rutaDestino)===TRUE)
      {
        throw new FileException("El fichero $rutaDestino ya existe", 1);
      }

      if (!copy($rutaOrigen, $rutaDestino)) {
        throw new FileException("No se ha podido copiar el archivo", 1);
      }

    }
  }
 ?>
