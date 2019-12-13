<?php
/**
 * Autor
 */
class Autor implements IEntity
{
  private $id;

  private $nombre;

  private $email;

  private $contraseña;

  private $foto;

  const RUTA_IMAGES_AUTORES = "images/autores/";

  //Constructor
  function __construct($nombre="",$email="", $contraseña='', $foto='')
  {
    $this->id         =   null;
    $this->contraseña =   $contraseña;
    $this->nombre     =   $nombre;
    $this->email      =   $email;
    $this->foto       =   $foto;
  }

    public function toArray(): array
    {
      return [
        "id"                  =>$this->getId(),
        "nombre"              =>$this->getNombre(),
        "email"               =>$this->getEmail(),
        "foto"                =>$this->getFoto(),
        "contraseña"          =>$this->getContrase()
      ];
    }

    public function getURLPerfil()
    {
        return self::RUTA_IMAGES_AUTORES . $this->getNombre();
    }
    /**
     * Get the value of Autor
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Autor
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

    /**
     * Get the value of Post
     *
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set the value of Post
     *
     * @param mixed $post
     *
     * @return self
     */
    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get the value of Email
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of Email
     *
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    /**
     * Get the value of Contrase
     *
     * @return mixed
     */
    public function getContrase()
    {
        return $this->contrase;
    }

    /**
     * Set the value of Contrase
     *
     * @param mixed $contrase
     *
     * @return self
     */
    public function setContrase($contrase)
    {
        $this->contrase = $contrase;

        return $this;
    }
    /**
     * Get the value of Foto
     *
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Get the value of Foto
     *
     * @return mixed
     */
    public function getUrlFoto()
    {
        return self::RUTA_IMAGES_AUTORES . $this->getFoto();
    }

    /**
     * Set the value of Foto
     *
     * @param mixed $foto
     *
     * @return self
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

}

 ?>
