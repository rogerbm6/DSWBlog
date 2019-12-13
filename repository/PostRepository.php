<?php
require_once 'database/QueryBuilder.php';
require_once 'entity/Post.php';
require_once 'entity/Categoria.php';
require_once 'repository/CategoriaRepository.php';
/**
 *
 */
class PostRepository extends QueryBuilder
{

  public function __construct(string $table="post", string $classEntity="Post")
  {
    parent::__construct($table, $classEntity);
  }

  public function getCategoria(Post $post): Categoria
  {
    $categoriaRepository = new CategoriaRepository();
    return $categoriaRepository->find($post->getCategoria());
  }
}


 ?>
