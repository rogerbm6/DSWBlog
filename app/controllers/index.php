<?php
require_once 'utils/utils.php';
require_once 'exceptions/AppException.php';
require_once 'exceptions/FileException.php';
require_once 'exceptions/NotFoundException.php';
require_once 'exceptions/QueryException.php';

try {
  $connection = App::getConnection();
  $postRepository  = new PostRepository();
  $categoriaRepository = new CategoriaRepository();
  $autorRepository  = new AutorRepository();
  

  $posts = $postRepository->findAll();


} catch (FileException $fileException) {
  $fileException->getMessage();
}catch (QueryException $QueryException) {
  $QueryException->getMessage();
}catch (AppException $AppException) {
  $AppException->getMessage();
}


require __DIR__ .'/../views/index.view.php';
 ?>
