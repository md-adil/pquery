<?php
/**
* 
*/
class StdClass
{
	public function __call($fn, $args) {
 		$calledClass = get_called_class();
 		echo $calledClass;

	}	
}