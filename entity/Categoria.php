<?php
require_once 'database/IEntity.php';
/**
 * Categoría de cada imagen
 */
class Categoria implements IEntity
{
  private $id;

  private $nombre;


  function __construct($nombre = "")
  {
    $this->id=null;
    $this->nombre=$nombre;
  }

  public function toArray(): array
  {
    return [
      "id"                  =>$this->getId(),
      "nombre"              =>$this->getNombre()
    ];
  }

    /**
     * Get the value of Categoría de cada imagen
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Categoría de cada imagen
     *
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Nombre
     *
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of Nombre
     *
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

}

 ?>
