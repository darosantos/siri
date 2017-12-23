<?php
if ( !CheckDependencies::versionPHP() ) {
	throw new Exception ( '<p>O sistema não pode ser executado sob esta versão do PHP<p>' );
}
/*
if ( !CheckDependencies::versionApache() ) {
	throw new Exception ( '<p>O sistema não pode ser executado sob esta versão do Apache</p>' );
}
*/
if ( !CheckDependencies::versionMySQL() ) {
	throw new Exception ( '<p>O sistema não pode ser executado sob esta versão do MySQL</p>' );
}
if ( !CheckDependencies::installedPHPExtensions() ) {
	$msgError = '<p>Há extesões do PHP requeridas que não foram instaladas!</p>';
	$extPhp = CheckDependencies::listStatusPHPExtension();
	$tableExt = '<table border="1"><tr><td>Extensão</td><td>Status</td></tr>';
	foreach ( $extPhp as $key => $value ) {
		$tableExt .= '<tr><td>' . $key . '</td><td>' . ($value ? 'Ok' : 'Off') . '</td></tr>';
	}
	$tableExt .= '</table>';
	
	throw new Exception ( $msgError . $tableExt );
}

if ( !CheckDependencies::installedApacheModule() ) {
	$msgError = '<p>Há módulos do Apache requeridas que não foram instalados!</p>';
	$mdlApache = CheckDependencies::listStatusApacheModule ();
	$tableMdl = '<table border="1"><tr><td>Módulo</td><td>Status</td></tr>';
	foreach ( $mdlApache as $key => $value ) {
		$tableMdl .= '<tr><td>' . $key . '</td><td>' . ($value ? 'Ok' : 'Off') . '</td></tr>';
	}
	$tableMdl .= '</table>';
	
	throw new Exception ( $msgError . $tableMdl );
}

if ( !isset( $_SESSION ) || session_status() == PHP_SESSION_DISABLED ){
	throw new Exception( 'Uma sessão não foi inicializada corretamente.' );
}

date_default_timezone_set( TIMEZONE );
set_time_limit ( MAX_EXECUTION_TIME );
ini_set( 'default_charset', DEFAULT_CHARSET );
ini_set( 'upload_max_filesize', MAX_UPLOAD_SIZE );
ini_set( 'post_max_size', MAX_UPLOAD_SIZE );
ini_set( 'memory_limit', MEMORY_LIMIT );

if ( DEBUG_MODE == 'ON'){
	error_reporting(E_ALL | E_STRICT);
	ini_set ( 'display_errors', 'On' );
	ini_set ( 'display_startup_errors', 'On' );
	ini_set( 'html_errors', 'On' );
	ini_set( 'ignore_repeated_errors', 'On' );
	ini_set( 'ignore_repeated_source', 'On' );
	ini_set( 'log_errors', 'On' );
	ini_set( 'report_memleaks', 'On' );
	ini_set( 'track_errors', 'On' );
	ini_set( 'error_log', PATHTOLOG . 'gfc17.txt' );
}
?>