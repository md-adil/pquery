<?php
/**
* 
*/
class Core
{
	
	protected $var;
	protected $allowed;
	private $called_class;
	function __construct() {
		$this->called_class = get_called_class();
	}

	protected function isRegex($pattern) {
		return preg_match('/^\/.+\/$/', $pattern);
	}

	public function __clone() {
		return new $called_class($this->var);
	}

	public function __call($fn, $args) {
		if($this->called_class == 'Arr') {
			$fn = "array_{$fn}";
		}
		try {
			$args[] = $this->var;
			$this->var = call_user_func_array($fn, $args);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		return $this;
	}

	public function __get($var) {
		if(in_array($var, $this->allowed)) {
			return $this->{$var}();
		}
		if($this->called_class == 'Arr') {
			$var = "array_{$var}";
		}
		$this->var = $var($this->var);
		return $this;
	}

	public function __invoke() {
		return $this->var;
	}
}