<?php
if (isset($_GET['folder'])) {
  $folder = $_GET['folder'];
  $path = '';

  switch ($folder) {
    case 'apache':
      $path = 'xampp_install_location/apache/';
      break;
    case 'php':
      $path = 'xampp_install_location/php/';
      break;
    case 'phpMyAdmin':
      $path = 'xampp_install_location/phpMyAdmin/';
      break;
  }

  if ($path) {
    // Open the folder in the default file browser
    exec("explorer " . escapeshellarg($path));
  }
}

header('Location: index.php');
?>