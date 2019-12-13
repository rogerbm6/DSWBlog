<?php
require_once 'exceptions/QueryException.php';
require_once 'exceptions/NotFoundException.php';
/**
 * Constructor de consultas
 */
abstract class QueryBuilder
{
  private $connection;
  private $table;
  private $classEntity;

  public function __construct(string $table, string $classEntity)
  {
    $this->connection = App::getConnection();
    $this->table = $table;
    $this->classEntity = $classEntity;
  }
  /**
   * findAll--> Devuelve un array de alguna clase pero con datos de la BBDD
   * @param  string $table       tabla en la BBDD
   * @param  string $classEntity Clase que vas a rellenar con datos de la BBDD
   * @return [type]              Array
   */
  public function findAll()
  {
    $sql = "SELECT * FROM $this->table";
    //apartir del string sql hace la consulta y devuelve un array de onjetos
    $pdoStatement = $this->executeQuery($sql);

    return $pdoStatement;
  }

  public function save(IEntity $entity): void
  {
    try {
      $parameters = $entity->toArray();
      //crea un string para una insercion a la BBDD, %s es un caracter especial, que posteriormente se
      //cambia por los parametros introducidos
      $sql = sprintf("insert into %s (%s) values (%s)",
        $this->table,
        implode(", ", array_keys($parameters)),
        ":".implode(", :",array_keys($parameters))
        );
      $statement = $this->connection->prepare($sql);
      $statement->execute($parameters);

    } catch (QueryException $QueryException) {
          throw new QueryException("Error al insertar en la BBDD.");
    }

  }

  public function executeQuery(string $sql): array
  {
    $pdoStatement = $this->connection->prepare($sql);
    if ($pdoStatement->execute()===false)
      throw new QueryException("No se ha podido ejecutar la consulta");

    return $pdoStatement->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,
    $this->classEntity);

  }

  public function find(int $id): IEntity
  {
    $sql = "SELECT * FROM $this->table WHERE id=$id";
    $result = $this->executeQuery($sql);
    if (empty($result))
      throw new NotFoundException("No se ha encontrado el elemento con id $id");

    return $result[0];

  }

  public function findAllAutor(int $id)
  {
    $sql = "SELECT * FROM $this->table WHERE autor=$id";
    $result = $this->executeQuery($sql);
    if (empty($result))
      throw new NotFoundException("No se han encontrado datos");
    return $result;

  }

  public function findAutor(string $nombre, string $contra): IEntity
  {
    $sql = "SELECT * FROM $this->table WHERE nombre='$nombre' and contraseña='$contra'";
    $result = $this->executeQuery($sql);
    if (empty($result))
      throw new NotFoundException("No se ha encontrado ningun usuario");
    return $result[0];

  }

  public function updatePost(string $titulo, string $contenido, string $categoria, string $imagen, $id)
  {
    $sql = "UPDATE $this->table SET titulo = '$titulo', contenido = '$contenido', categorias='$categoria', imagen = '$imagen' WHERE id = $id";
    $sentencia = $this->connection->prepare($sql);
    $sentencia->execute();

  }

  public function deleteById($id)
  {
    $sql = "DELETE FROM $this->table where id = $id";

    $sentencia = $this->connection->prepare($sql);
    $sentencia->execute();

  }


}


 ?>
