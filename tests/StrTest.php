<?php
/**
* 
*/
class StrTest extends PHPUnit_Framework_TestCase
{
	
	public function setUp() {
		$this->lorem = str("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore nemo, similique reprehenderit quo minima quia repellendus eum eveniet enim commodi! Vero, dolorem, alias. Sequi iure necessitatibus, quibusdam officia commodi voluptates?");
	}

	public function testSplit() {
		$str = str("Apple Book");
		$res = $str->split(" ");
		$this->assertEquals($res, arr(['Apple', 'Book']));
	}

	public function testSplitWithRegex() {

	}

	public function testHtml() {
		$str = str("Things");
		$this->assertEquals($str->html('p'), str('<p>Things</p>'));
		$this->assertEquals($str->html('p', ['class' => 'object', 'id' => 'apps']),
			str('<p class="object" id="apps">Things</p>'));
	}

	public function testLength() {
		$length = $this->lorem->length;
		$this->assertInternalType("int", $length);
		$this->assertEquals($length, 235);
	}

	public function testEqual() {
		$str = str("Apple");
		$this->assertTrue($str->equal("Apple"));
	}

	public function testPluralize() {
		$str = str("child");
		$this->assertEquals($str->plural, str('children'));
	}
	public function testSinglularize() {
		$str = str("children");
		$this->assertEquals($str->singular, str('child'));
	}

	public function testCamelCase() {

	}

	public function testSnakeCase() {

	}

	public function testUpperCase() {

	}
	public function testLowerCase() {
		
	}
}