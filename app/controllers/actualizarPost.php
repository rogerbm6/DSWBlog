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



try {
  //guarda   la configuracion en el contenedor de ID

  $connection = App::getConnection();
  $postRepository  = new PostRepository();

  if ($_SERVER["REQUEST_METHOD"]==="POST")
  {
    $titulo = trim(htmlspecialchars($_POST["titulo"]));
    $contenido = trim($_POST["contenido"]);
    $categoria = trim(htmlspecialchars($_POST["categoria"]));
    $postActual = $postRepository->find($_POST["id_post"]);
    $imagenActual = $_POST["imagen"];

    $tiposAceptados = ["image/jpeg", "image/png", "image/gif"];

    $tiposAceptados = ["image/jpeg", "image/png", "image/gif"];

    if ($_FILES['imagen']['name']) {

      //borrar imagen de servidor
      $imagenBorrar = $postRepository->find($postActual->getId());

      unlink(Post::RUTA_IMAGES_POSTS.$imagenBorrar->getImagen());
      //crea nueva imagen
      $imagen = new File("imagen", $tiposAceptados);
      $imagen->saveUploadFile(Post::RUTA_IMAGES_POSTS);
      $postRepository->updatePost($titulo,$contenido,$categoria,$imagen->getFileName(),$postActual->getId());
    }else {
        $postRepository->updatePost($titulo,$contenido,$categoria,$imagenActual,$postActual->getId());
    }


    header("Location:admin");
  }




} catch (FileException $fileException) {
  $fileException->getMessage();
}catch (QueryException $QueryException) {
  $QueryException->getMessage();
}catch (AppException $AppException) {
  $AppException->getMessage();
}

 ?>
