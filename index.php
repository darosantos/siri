<?php
if( !isset( $_SESSION ) || session_status() == PHP_SESSION_DISABLED ){
	session_start();
}

global $APP_ENGINE;

/**
 * Estrutura básica da aplicação
 */
$GLOBALS['APP_ENGINE'] = array('APP_NAME' => 'siri',
    'VERIFIY_PHP_OPTIONS' => ''
);

include_once ('loader.php');
?>