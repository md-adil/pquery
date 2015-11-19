<?php
use PQuery\Arr;
use PQuery\Str;
/**
* 
*/
class ArrTest extends PHPUnit_Framework_TestCase
{
	
	public function testJoin() {
		$name = arr([
			'Adil',
			'Ali Sahil'
		]);
		$this->assertEquals($name->join(' '), str('Adil Ali Sahil'));
	}
}