<?php

use common\utility\CheckDependencies;

if ( !defined(VERIFY_PHP_VERSION ) ||  VERIFY_PHP_VERSION === 'On' ){
    if ( !CheckDependencies::versionPHP() ) {
        throw new Exception ( '<p>O sistema não pode ser executado sob esta versão do PHP<p>' );
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
}
if ( !defined(VERIFY_APACHE_VERSION ) ||  VERIFY_APACHE_VERSION === 'On' ){
    if ( !CheckDependencies::versionApache() ) {
        throw new Exception ( '<p>O sistema não pode ser executado sob esta versão do Apache</p>' );
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
}
if ( !defined(VERIFY_MYSQL_VERSION ) ||  VERIFY_MYSQL_VERSION === 'On' ){
    if ( !CheckDependencies::versionMySQL() ) {
        throw new Exception ( '<p>O sistema não pode ser executado sob esta versão do MySQL</p>' );
    }
}


if ( defined('APPLY_DEFAULT_PHP_OPTIONS') && APPLY_DEFAULT_PHP_OPTIONS === 'On' ){
    ini_set( 'date.timezone', defined('TIMEZONE' )? TIMEZONE : 'America/Cuiaba' );
    ini_set( 'output_buffering', defined('OUTPUT_BUFFERING' )? OUTPUT_BUFFERING : 'On' );
    ini_set( 'zlib.output_compression', defined('ZLIB_OUTPUT_COMPRESSION' )? ZLIB_OUTPUT_COMPRESSION : 'On' );
    ini_set( 'max_execution_time', defined('MAX_EXECUTION_TIME' )? MAX_EXECUTION_TIME : '600' );
    ini_set( 'max_input_time', defined('MAX_INPUT_TIME' )? MAX_INPUT_TIME : '360' );
    ini_set( 'memory_limit', defined('MEMORY_LIMIT')? MEMORY_LIMIT : '128M' );
    ini_set( 'upload_max_filesize', defined('MAX_UPLOAD_SIZE' )? MAX_UPLOAD_SIZE  : '2M' );
    ini_set( 'post_max_size', defined('MAX_UPLOAD_SIZE' )? MAX_UPLOAD_SIZE  : '2M' );
    ini_set( 'default_mimetype', defined('DEFAULT_MIMETYPE' )? DEFAULT_MIMETYPE  : 'text/html' );
    ini_set( 'default_charset', defined('DEFAULT_CHARSET' )? DEFAULT_CHARSET  : 'UTF-8' );
    ini_set( 'max_file_uploads', defined('MAX_FILE_UPLOADS' )? MAX_FILE_UPLOADS  : '3' );
    ini_set( 'session.save_path', defined('SESSION_SAVE_PATH' )? SESSION_SAVE_PATH  : '/tmp' );
    ini_set( 'session.cookie_httponly', defined('SESSION_COOKIE_HTTPONLY' )? SESSION_COOKIE_HTTPONLY  : 'On' );
    ini_set( 'session_cache_expire', defined('SESSION_CACHE_EXPIRE' )? SESSION_CACHE_EXPIRE  : '15' );
    ini_set( 'session.name', defined('SESSION_NAME' )? SESSION_NAME  : sha1( mktime() ) );
}

if ( DEBUG_MODE === 'On'){
	ini_set ( 'display_errors', 'On' );
	ini_set ( 'display_startup_errors', 'On' );
    if ( !defined('PATH_LOG' ) ){
        define( 'PATH_LOG', __DIR__ . DIRECTORY_SEPARATOR );
    }
    if ( !defined(  'LOG_FILENAME' ) ){
        define('LOG_FILENAME', sha1(mktime() . ' - ' . date('Y-m-d' . '.log')));
    }
    error_reporting(E_ALL | E_STRICT );
    ini_set( 'error_log', PATH_LOG . LOG_FILENAME );
    ini_set( 'log_errors', 'On' );
    ini_set( 'ignore_repeated_errors', 'On' );
    ini_set( 'ignore_repeated_source', 'On' );
    ini_set( 'report_memleaks', 'On' );
    ini_set( 'track_errors', 'On' );
    ini_set( 'html_errors', 'On' );
}

if (session_status() == PHP_SESSION_DISABLED) {
    $identityErrorFrom = $_SERVER['REQUEST_METHOD'] . ' ' . $_SERVER['SERVER_PROTOCOL'] . ' ' . $_SERVER['REMOTE_ADDR'] . ':' . $_SERVER['REMOTE_PORT'];
    $descriptionError = 'Session not started' . ' - ' . $_SERVER['SCRIPT_FILENAME'] . ' in ' . $_SERVER['REQUEST_TIME'];
    $errorMsg = date('d/m/Y h:i:s') . "\t" . $identityErrorFrom . "t" . $descriptionError . "\n";
    @error_log($errorMsg, 3, PATH_LOG . 'session.log');
    throw new Exception('<h1>Problemas com o servidor: impossível inicializar uma sessão!</h1>');
}

if (!session_start()) {
    $identityErrorFrom = $_SERVER['REQUEST_METHOD'] . ' ' . $_SERVER['SERVER_PROTOCOL'] . ' ' . $_SERVER['REMOTE_ADDR'] . ':' . $_SERVER['REMOTE_PORT'];
    $descriptionError = 'Impossible start session' . ' - ' . $_SERVER['SCRIPT_FILENAME'] . ' in ' . $_SERVER['REQUEST_TIME'];
    $errorMsg = date('d/m/Y h:i:s') . "\t" . $identityErrorFrom . "t" . $descriptionError . "\n";
    @error_log($errorMsg, 3, PATH_LOG . 'session.log');
    throw new Exception('<h1>Problemas com o servidor: impossível inicializar uma sessão!</h1>');
}
?>