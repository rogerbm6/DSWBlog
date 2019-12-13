<?php
require_once 'database/QueryBuilder.php';
/**
 *
 */
class CategoriaRepository extends QueryBuilder
{

  public function __construct(string $table="categoria", string $classEntity="Categoria")
  {
    parent::__construct($table, $classEntity);
  }
}
 ?>
