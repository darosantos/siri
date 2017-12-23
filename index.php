<?php
if( !isset( $_SESSION ) || session_status() == PHP_SESSION_DISABLED ){
	session_start();
}

include_once ('loader.php');
?>