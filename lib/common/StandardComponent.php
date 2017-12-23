<?php

namespace Application\lib\common;

use ReflectionClass;

trait StandardComponent {
	
	public function __construct( ){
		$this->init();
	}
	
	public function __destruct(){
		$this->free();
	}
	
	public function init(){
		$className = get_class( $this );
		$inspector = new ReflectionClass( $className );
		foreach ( $inspector->getProperties() as $attrib ) {
			$ppty = $attrib->getName();
			$this->$ppty = NULL;
		}
	}
	
	public function free(){
		$className = get_class ( $this );
		$inspector = new ReflectionClass ( $className );
		foreach ( $inspector->getProperties () as $attrib ) {
			$ppty = $attrib->getName();
			unset( $this->$ppty );
		}
	}
	
	public function __toString(){
		$classToString = get_class( $this );
		if ( method_exists( $this, 'dumping' ) ){
			$classToString = $this->dumping();
		}
		return $classToString;
	}
	
	public function __invoke( $param ){
		$className = get_class ( $this );
		throw new Exception( 'Error class at ' . $className );
	}
	
}
?>