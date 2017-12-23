<?php

namespace Application\lib;

use Application\lib\common\StandardComponent;

final class ManageApp extends StandardComponent {
	private $headerHttp;
	private $outputPage;
	private $name = 'filho';
	const OUTPUT_TYPE_LOCATIION = 0;
	const OUTPUT_TYPE_HTML = 1;
	const OUTPUT_TYPE_PDF = 2;
	const OUTPUT_TYPE_IMAGE = 3;
	const OUTPUT_TYPE_JSON = 4;
	const OUTPUT_TYPE_XML = 5;
	public function __construct() {
		$this->headerHttp = array ();
		$this->outputPage = '<h1>Danilo</h1>';
		echo '</p>Objeto foi construido</p>';
	}
	/*public function __destruct() {
		//$this->freeAllProperties ();
		echo '</p>O objeto sera destruido dentro do filho</p>';
		echo '<p>Nome da classe no filho: ' . get_class() . '</p>';
		
	}*/
	public function getProperty($propertyName) {
		$result = NULL;
		if (property_exists ( get_class ( $this ), $propertyName ) & ! empty ( $propertyName )) {
			$result = $this->$propertyName;
		}
		return $result;
	}
	public function setProperty($propertyName, $value) {
		$result = false;
		if (property_exists ( get_class ( $this ), $propertyName )) {
			if (! empty ( $propertyName ) & ! empty ( $value )) {
				$this->$propertyName = $value;
				$result = true;
			}
		}
		return $result;
	}
	protected function freeVariableMethod($propertyName) {
		$result = false;
		if (! empty ( $propertyName ) & is_string ( $propertyName )) {
			unset ( $this->$propertyName );
			$result = true;
		}
		return $result;
	}
	public function run() {
		$uri = filter_input ( INPUT_GET, 'p', FILTER_SANITIZE_STRING );
		echo $uri;
		return;
		if (! empty ( $uri )) {
			$uri = str_replace ( PROJECT_FOLDER, '', $uri );
			if (strpos ( $uri, '/' ) >= 0) {
				$uri = explode ( '/', $uri, 4 );
				if (count ( $uri ) > 3) {
					array_pop ( $uri );
				}
				$uri = implode ( '/', $uri );
			}
		}
	}
	public function show() {
		echo $this->outputPage;
	}
	public function dipatch() {
	}
}
?>