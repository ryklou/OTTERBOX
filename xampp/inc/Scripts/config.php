<?php
if (isset($_GET['file'])) {
  $file = $_GET['file'];
  $path = '';

  switch ($file) {
    case 'httpd.conf':
      $path = 'xampp_install_location/apache/conf/httpd.conf';
      break;
    case 'httpd-ssl.conf':
      $path = 'xampp_install_location/apache/conf/extra/httpd-ssl.conf';
      break;
    case 'httpd-xampp.conf':
      $path = 'xampp_install_location/apache/conf/httpd-xampp.conf';
      break;
    case 'php.ini':
      $path = 'xampp_install_location/php/php.ini';
      break;
    case 'config.inc.php':
      $path = 'xampp_install_location/phpMyAdmin/config.inc.php';
      break;
  }

  if ($path) {
    // Open the file in the default editor
    exec("start " . escapeshellarg($path));
  }
}

header('Location: index.php');
