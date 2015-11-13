<?php
/**
* 
*/
class PDOAccessor extends Arr
{
	protected $var;
	// Preventing parent cunstructor to be called.
	public function __construct() {}
	public function __set($key, $value) {
		$this->var[$key] = $value;
	}

	public function __get($key) {
		if(isset($this->var[$key])) {
			return new Str($this->var[$key]);
		}
	}
}