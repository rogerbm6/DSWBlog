<?php
require_once 'utils/utils.php';
require_once 'exceptions/AppException.php';
require_once 'exceptions/FileException.php';
require_once 'exceptions/NotFoundException.php';
require_once 'exceptions/QueryException.php';
session_start();
$mensaje ='';

if (isset($_SESSION['usuario']) && isset($_SESSION['usuario_id'])) {
  header("Location:admin");
}

  try {

      $connection = App::getConnection();
      $autorRepository  = new AutorRepository();

      if ($_SERVER["REQUEST_METHOD"]==="POST")
      {
        $usuario = trim(htmlspecialchars($_POST["usuario"]));
        $contraseña = trim(htmlspecialchars($_POST["contra"]));
        //$contra = md5($contraseña);

        $usuario = $autorRepository->findAutor($usuario,$contraseña);
        if (!empty($usuario)) {
          $_SESSION['usuario'] = $usuario->getNombre();
          $_SESSION['usuario_id'] = $usuario->getId();

          header("Location:admin");
        }else {
          header("Location:index");
        }
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

require __DIR__ .'/../views/login.view.php';

 ?>
