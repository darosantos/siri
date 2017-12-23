<?php

global $uri;
$uri = filter_input( INPUT_GET, 'p', FILTER_SANITIZE_STRING );
$dataCoded = '';
if ( !empty( $uri ) ){
  $uri = str_replace( WEB_ROOT, '', $uri );
  if ( strpos( $uri, '/' ) >= 0 ){
    $uri = explode( '/', $uri, 4);
	if ( count( $uri ) >= 3 ){
		$dataCoded = array_pop( $uri );
	}
	$uri = implode( '/', $uri );
  }
}

ob_start();

$oExecRouteSystem = new ExecRouteSystem();
$oExecRouteSystem->exec( $uri, $dataCoded );

ob_end_flush();
?>