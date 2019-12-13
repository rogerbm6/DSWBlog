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

$errores = [];
$titulo='';
$contenido='';



try {
  //guarda   la configuracion en el contenedor de ID

  $connection = App::getConnection();
  $postRepository  = new PostRepository();
  $categoriaRepository = new CategoriaRepository();
  $autorRepository  = new AutorRepository();

  $autor = $autorRepository->find($_SESSION["usuario_id"]);
  $categorias = $categoriaRepository->findAll();
  if ($_SERVER["REQUEST_METHOD"]==="POST")
  {
    $titulo = trim(htmlspecialchars($_POST["titulo"]));
    $contenido = trim($_POST["contenido"]);
    $categoria = trim(htmlspecialchars($_POST["categoria"]));

    $tiposAceptados = ["image/jpeg", "image/png", "image/gif"];

    $tiposAceptados = ["image/jpeg", "image/png", "image/gif"];

    $imagen = new File("imagen", $tiposAceptados);

    $imagen->saveUploadFile(Post::RUTA_IMAGES_POSTS);

    //Para base de datos
    //inserta
    $post = new Post(date("Y-m-d H:i:s"), $titulo, $contenido, $imagen->getFileName(),$categoria, $autor->getId());
    $postRepository->save($post);
    $mensaje = "Se ha guardado la imagen en la BBDD";

    header("Location:admin");
  }




} catch (FileException $fileException) {
  $errores []= $fileException->getMessage();
}catch (QueryException $QueryException) {
  $errores []= $QueryException->getMessage();
}catch (AppException $AppException) {
  $errores [] = $AppException->getMessage();
}catch (NotFoundException $NotFoundException) {
  $errores [] = $NotFoundException->getMessage();
}

require __DIR__ .'/../views/autor.view.php';
 ?>
