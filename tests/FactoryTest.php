<?php
use PHPUnit\Framework\TestCase;
use Lib\Color\ColorFactory;
use Lib\Color\Color;
use MischiefCollective\ColorJizz\Formats\RGB;

class FactoryTest extends TestCase
{
	public function testRGB()
	{
		$r = 10;
		$g = 20;
		$b = 30;
		$color = ColorFactory::RGB($r, $g, $b);
		$color = $color->transform('hsl');
		$color2 = new RGB($r, $g, $b);
		$color2 = $color->toHSL();
		$this->assertEquals($color2, $color);
	}
}
?>