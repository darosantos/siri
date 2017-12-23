<?php
namespace Application\lib\utility;

/**
 * 
 * @author Danilo
 * @todo Retornar código de erro
 */
final class ArrayFacility {
	
	public static function extract( $int_key, $array_array ){
		
		if( !is_int( $int_key ) || !is_array( $array_array ) )
			return false;
		
		$size_array = count( $array_array );
		if( $int_key > $size_array ){
			return false;
		}
		
		$element = $array_array[$int_key];
		
		for( $i = $int_key; $i < $size_array-1; ++$i ){
			$array_array[$i] = $array_array[$i+1];
		}
		
		$array_array = array_pop( $array_array );
		
		return $element;
	}
}
?>