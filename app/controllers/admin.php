<?php
require_once 'utils/utils.php';
require_once 'exceptions/AppException.php';
require_once 'exceptions/FileException.php';
require_once 'exceptions/NotFoundException.php';
require_once 'exceptions/QueryException.php';

session_start();

if(!isset($_SESSION["usuario"])){
  session_start();
  session_unset();
  session_destroy();
	header("Location:index");
}

$errores=[];

try {
  $connection = App::getConnection();
  $autorRepository  = new AutorRepository();
  $postRepository  = new PostRepository();
  $categoriaRepository = new CategoriaRepository();

  $categorias = $categoriaRepository->findAll();
  $autor = $autorRepository->find($_SESSION["usuario_id"]);


  if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $borrado = $_POST['id_borrar'];
    $imagenBorrar = $postRepository->find($borrado);
    $postRepository->deleteById($borrado);

    unlink(Post::RUTA_IMAGES_POSTS.$imagenBorrar->getImagen());
  }

  //if ($postRepository->findAllAutor($_SESSION["usuario_id"])==true) {
    $post=0;
    $posts = $postRepository->findAllAutor($_SESSION["usuario_id"]);
//  }






} catch (FileException $fileException) {
  $errores []= $fileException->getMessage();
}catch (QueryException $QueryException) {
  $errores []= $QueryException->getMessage();
}catch (AppException $AppException) {
  $errores [] = $AppException->getMessage();
}catch (NotFoundException $NotFoundException) {
  $errores [] = $NotFoundException->getMessage();
}

require __DIR__ .'/../views/admin.view.php';
 ?>
