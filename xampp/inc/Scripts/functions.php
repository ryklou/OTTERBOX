<?php
$phpmyadmin = "./phpmyadmin/";

function getApachePIDs() {
  $output = [];
  exec( 'wmic process where "name=\'httpd.exe\'" get ProcessId', $output );
  array_shift( $output ); // Remove the header from the output
  return implode( ', ', array_filter( $output ) );
}

function getApachePorts() {
  $output = [];
  $pids = getApachePIDs();
  if ( $pids ) {
    $pidList = explode( ', ', $pids );
    foreach ( $pidList as $pid ) {
      exec( "netstat -aon | findstr /R /C:\"LISTENING.*$pid\"", $tempOutput );
      $output = array_merge( $output, $tempOutput );
    }
    $ports = [];
    foreach ( $output as $line ) {
      preg_match( '/\d+\.\d+\.\d+\.\d+:(\d+)/', $line, $matches );
      if ( isset( $matches[ 1 ] ) ) {
        $ports[] = $matches[ 1 ];
      }
    }
    return implode( ', ', $ports );
  }
  return '';
}

function isApacheRunning() {
  $pids = getApachePIDs();
  return !empty( $pids );
}

function getMySQLPIDs() {
  $output = [];
  exec( 'wmic process where "name=\'mysqld.exe\'" get ProcessId', $output );
  array_shift( $output ); // Remove the header from the output
  return implode( ', ', array_filter( $output ) );
}

function getMySQLPorts() {
  $output = [];
  $pids = getMySQLPIDs();
  if ( $pids ) {
    $pidList = explode( ', ', $pids );
    foreach ( $pidList as $pid ) {
      exec( "netstat -aon | findstr /R /C:\"LISTENING.*$pid\"", $tempOutput );
      $output = array_merge( $output, $tempOutput );
    }
    $ports = [];
    foreach ( $output as $line ) {
      preg_match( '/\d+\.\d+\.\d+\.\d+:(\d+)/', $line, $matches );
      if ( isset( $matches[ 1 ] ) ) {
        $ports[] = $matches[ 1 ];
      }
    }
    return implode( ', ', $ports );
  }
  return '';
}

function isMySQLRunning() {
  $pids = getMySQLPIDs();
  return !empty( $pids );
}

function getFileZillaPIDs() {
  $output = [];
  exec( 'wmic process where "name=\'filezillaserver.exe\'" get ProcessId', $output );
  array_shift( $output ); // Remove the header from the output
  return implode( ', ', array_filter( $output ) );
}

function isFileZillaRunning() {
  $pids = getFileZillaPIDs();
  return !empty( $pids );
}

function getFileZillaPorts() {
  $output = [];
  $pids = getFileZillaPIDs();
  if ( $pids ) {
    $pidList = explode( ', ', $pids );
    foreach ( $pidList as $pid ) {
      exec( "netstat -aon | findstr /R /C:\"LISTENING.*$pid\"", $tempOutput );
      $output = array_merge( $output, $tempOutput );
    }
    $ports = [];
    foreach ( $output as $line ) {
      preg_match( '/\d+\.\d+\.\d+\.\d+:(\d+)/', $line, $matches );
      if ( isset( $matches[ 1 ] ) ) {
        $ports[] = $matches[ 1 ];
      }
    }
    return implode( ', ', $ports );
  }
  return '';
}
function openConfigFile($filePath) {
    $filePath = str_replace('xampp_install_location', 'C:/ryklou/', $filePath);
}

?>