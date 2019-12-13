<?php
function active($value='')
{

  if (strpos($_SERVER["REQUEST_URI"], $value)) {
    echo "active";
  }

}
 ?>
