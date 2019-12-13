<?php
require_once "App.php";
require_once 'Request.php';

require_once 'utils/utils.php';
require_once 'utils/File.php';
require_once 'entity/Categoria.php';
require_once 'entity/Autor.php';
require_once 'entity/Post.php';
require_once 'database/Connection.php';
require_once 'database/QueryBuilder.php';
require_once 'repository/PostRepository.php';
require_once 'repository/CategoriaRepository.php';
require_once 'repository/AutorRepository.php';

$config = require_once __DIR__ . "/../app/config.php";

App::bind("config", $config);
 ?>
