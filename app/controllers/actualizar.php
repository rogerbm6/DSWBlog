<?php
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

$mensaje ='';
$errores = [];
$titulo='';
$contenido='';



try {
  //guarda   la configuracion en el contenedor de ID

  $connection = App::getConnection();
  $postRepository  = new PostRepository();
  $categoriaRepository = new CategoriaRepository();
  $autorRepository  = new AutorRepository();
  
  $postActual = $postRepository->find($_POST["id_actualizar"]);
  $categoriaActual = $categoriaRepository->find($postActual->getCategoria());
  $categorias = $categoriaRepository->findAll();
  $autor = $autorRepository->find($_SESSION["usuario_id"]);

} catch (FileException $fileException) {
  $errores []= $fileException->getMessage();
}catch (QueryException $QueryException) {
  $errores []= $QueryException->getMessage();
}catch (AppException $AppException) {
  $errores [] = $AppException->getMessage();
}

require __DIR__ .'/../views/actualizar.view.php';
 ?>
