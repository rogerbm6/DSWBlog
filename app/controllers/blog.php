<?php
require_once 'utils/utils.php';
require_once 'exceptions/AppException.php';
require_once 'exceptions/FileException.php';
require_once 'exceptions/NotFoundException.php';
require_once 'exceptions/QueryException.php';

try {

    $connection = App::getConnection();
    $autorRepository  = new AutorRepository();
    $postRepository  = new PostRepository();
    $categoriaRepository = new CategoriaRepository();

    if ($_SERVER["REQUEST_METHOD"]==="POST")
    {
      $post = $postRepository->find($_POST['id_post']);
      $autor = $autorRepository->find($_POST['id_autor']);

    }else {
      header("Location:index");
    }

} catch (AppException $AppException) {
  $errores [] = $AppException->getMessage();
}



require __DIR__ .'/../views/blog.view.php';
 ?>
