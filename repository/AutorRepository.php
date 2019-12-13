<?php
require_once 'database/QueryBuilder.php';
/**
 *
 */
class AutorRepository extends QueryBuilder
{

  public function __construct(string $table="autor", string $classEntity="Autor")
  {
    parent::__construct($table, $classEntity);
  }
}
 ?>
