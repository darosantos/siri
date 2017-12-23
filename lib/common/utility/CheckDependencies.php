<?php

namespace Application\lib\utility;

final class CheckDependencies {
	public static function versionPHP() {
		$result = NULL;
		if (defined ( 'REQUIRED_PHP_VERSION' )) {
			$result = version_compare ( phpversion (), REQUIRED_PHP_VERSION, '>=' );
		}
		return $result;
	}
	public static function versionApache() {
		$result = NULL;
		if (defined ( 'REQUIRED_APACHE_VERSION' )) {
			$apacheVersion = apache_get_version ();
			$aux = explode ( '/', $apacheVersion, 2 );
			if (! is_array ( $aux )) {
				$result = false;
			} else {
				$numberVersion = substr ( $aux [1], 0, strpos ( $aux [1], ' ' ) );
				if (empty ( $numberVersion )) {
					$result = false;
				} else {
					$numberVersion = ( int ) str_replace ( '.', '', $numberVersion );
					$requiredVersion = ( int ) str_replace ( '.', '', REQUIRED_APACHE_VERSION );
					$result = ($numberVersion >= $requiredVersion);
				}
			}
		}
		return $result;
	}
	public static function versionMySQL() {
		$result = NULL;
		if (defined ( 'SERVER' ) && defined ( 'USER' ) && defined ( 'PASS' ) && defined ( 'REQUIRED_MYSQL_VERSION' )) {
			$con = mysqli_connect ( SERVER, USER, PASS );
			if (! $con) {
				$result = false;
			} else {
				$numberVersion = ( int ) str_replace ( '.', '', ( string ) mysqli_get_server_info ( $con ) );
				$requiredVersion = ( int ) str_replace ( '.', '', REQUIRED_MYSQL_VERSION );
				$result = ($numberVersion >= $requiredVersion);
			}
		}
		return $result;
	}
	public static function installedPHPExtensions() {
		$result = NULL;
		if (defined ( 'PHP_EXTENSION_REQUIRED' )) {
			$initialLoop = 0;
			$endLoop = count ( PHP_EXTENSION_REQUIRED );
			$searchLoop = true;
			
			while ( ($initialLoop < $endLoop) && $searchLoop ) {
				if (! extension_loaded ( PHP_EXTENSION_REQUIRED [$initialLoop] )) {
					$searchLoop = false;
				}
				$initialLoop += 1;
			}
			$result = $searchLoop;
		}
		return $result;
	}
	public static function installedApacheModule() {
		$result = NULL;
		if (defined ( 'APACHE_MODULE_REQUIRED' )) {
			$apacheModules = apache_get_modules ();
			$initialLoop = 0;
			$endLoop = count ( APACHE_MODULE_REQUIRED );
			$searchLoop = true;
			
			while ( ($initialLoop < $endLoop) && $searchLoop ) {
				if (! in_array ( APACHE_MODULE_REQUIRED [$initialLoop], $apacheModules )) {
					$searchLoop = false;
				}
				$initialLoop += 1;
			}
			$result = $searchLoop;
		}
		return $result;
	}
	public static function listStatusPHPExtension() {
		$extensionStatus = array ();
		if (defined ( 'PHP_EXTENSION_REQUIRED' )) {
			$endLoop = count ( PHP_EXTENSION_REQUIRED );
			for($initialLoop = 0; $initialLoop < $endLoop; ++ $initialLoop) {
				$name = PHP_EXTENSION_REQUIRED [$initialLoop];
				$extensionStatus [$name] = extension_loaded ( $name );
			}
		}
		return $extensionStatus;
	}
	public static function listStatusApacheModule() {
		$moduleStatus = array ();
		if (definded ( 'APACHE_MODULE_REQUIRED' )) {
			$apacheModules = apache_get_modules ();
			$endLoop = count ( APACHE_MODULE_REQUIRED );
			for($initialLoop = 0; $initialLoop < $endLoop; ++ $initialLoop) {
				$name = APACHE_MODULE_REQUIRED [$initialLoop];
				$moduleStatus [$name] = in_array ( $name, $apacheModules );
			}
		}
		return $moduleStatus;
	}
}
?>