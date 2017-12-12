<?php
use PHPUnit\Framework\TestCase;
use Lib\Color\ColorFactory;

class DefinitionTest extends TestCase
{
	public function testBlue()
	{
		$name = 'blue';
		$color = ColorFactory::color($name);
		$color = $color->transform('rgb');
		$this->assertEquals(0, $color->red);
		$this->assertEquals(0, $color->green);
		$this->assertEquals(255, $color->blue);
	}
}
?>