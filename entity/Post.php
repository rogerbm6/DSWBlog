<?php
require_once 'database/IEntity.php';
/**
 *Clase con los posts realizados por autores
 */
class Post implements IEntity
{
  private $id;

  private $fecha;

  private $titulo;

  private $contenido;

  private $imagen;

  private $autor;

  private $categorias;

  const RUTA_IMAGES_POSTS = "images/posts/publicaciones/";

  function __construct($fecha="", $titulo="", $contenido="", $imagen="", $categoria=1,$autor=1)
  {
    $this->id           =   null;
    $this->fecha        =   $fecha;
    $this->titulo       =   $titulo;
    $this->contenido    =   $contenido;
    $this->imagen       =   $imagen;
    $this->autor        =   $autor;
    $this->categorias   =   $categoria;
  }


  public function toArray(): array
  {
    return [
      "id"                  =>$this->getId(),
      "titulo"              =>$this->getTitulo(),
      "contenido"           =>$this->getContenido(),
      "fecha"               =>$this->getFecha(),
      "imagen"              =>$this->getImagen(),
      "autor"               =>$this->getAutor(),
      "categorias"          =>$this->getCategoria()
    ];
  }

  public function getURLPosts()
  {
      return self::RUTA_IMAGES_POSTS . $this->getImagen();
  }


    /**
     * Get the value of Clase con los posts realizados por autores
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Clase con los posts realizados por autores
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
     * Get the value of Fecha
     *
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of Fecha
     *
     * @param mixed $fecha
     *
     * @return self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of Titulo
     *
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of Titulo
     *
     * @param mixed $titulo
     *
     * @return self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of Contenido
     *
     * @return mixed
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set the value of Contenido
     *
     * @param mixed $contenido
     *
     * @return self
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get the value of Imagen
     *
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of Imagen
     *
     * @param mixed $imagen
     *
     * @return self
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of Autor
     *
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set the value of Autor
     *
     * @param mixed $autor
     *
     * @return self
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of Categoria
     *
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categorias;
    }

    /**
     * Set the value of Categoria
     *
     * @param mixed $categoria
     *
     * @return self
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

}

 ?>
