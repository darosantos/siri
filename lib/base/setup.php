<?php
spl_autoload_extensions ( '.php' );
spl_autoload_register ( function ( $className ) {
	$fileStream = ABSPATH . 'lib' . DIRECTORY_SEPARATOR . $className . '.php';
	
	if ( file_exists( $fileStream ) ){
		require_once ( $fileStream );
		$exists =  !class_exists( $className, false ) && !interface_exists( $className, false ) && !trait_exists( $className, false );
		if ( $exists ) {
			trigger_error( "Unable to load : $className", E_USER_WARNING );
		}
	}
	else {
		trigger_error( "Impossible load definition class", E_USER_WARNING );
	}
});
?>