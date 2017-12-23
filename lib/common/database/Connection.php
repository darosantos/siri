<?php

namespace Application\lib\database;

abstract class Connection{
	private $connected;
	private $driverConnection;
	
	public abstract function open();
	
	public abstract function close();
	
	public abstract function run();
	
	public function isConnected(){
		return $connected;
	}
	
	public function getConnection(){
		return $driverConnection;
	}
	
	private function afterConnection( $callback_function ){
		
	}
	
	private function beforeConnection( $callback_function ){
		
	}
	
	private function afterDisconnection( $callback_function ){
		
	}
	
	private function beforeDisconnection( $callback_function ){
		
	}
}
?>