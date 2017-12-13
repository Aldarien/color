<?php
use PHPUnit\Framework\TestCase;
use Lib\Color\ColorFactory;

class DefinitionTest extends TestCase
{
	protected function assertHex($result, $name)
	{
		$color = ColorFactory::color($name);
		$color = $color->transform('hex');
		$this->assertEquals($result, $color->hex);
	}
	public function testBlue()
	{
		$name = 'blue';
		$hex = 0x0000FF;
		$this->assertHex($hex, $name);
	}
	public function testRed()
	{
		$name = 'red';
		$hex = 0xFF0000;
		$this->assertHex($hex, $name);
	}
	public function testGreen()
	{
		$name = 'green';
		$hex = 0x008000;
		$this->assertHex($hex, $name);
	}
	public function testBlack()
	{
		$name = 'black';
		$hex = 0x0;
		$this->assertHex($hex, $name);
	}
	public function testWhite()
	{
		$name = 'white';
		$hex = 0xFFFFFF;
		$this->assertHex($hex, $name);
	}
}
?>