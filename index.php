<?php

  require 'core/bootstrap.php';

  $routes = require "app/routes.php";

  require $routes[Request::uri()];


 ?>
