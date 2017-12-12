<?php
use PHPUnit\Framework\TestCase;
use Lib\Color\ColorFactory;
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
	public function testColor()
	{
		$name = 'blue';
		$color = ColorFactory::color($name);
		$h = 240;
		$s = 100;
		$l = 50;
		$this->assertEquals($h, $color->getHue()->getValue());
		$this->assertEquals($s, $color->getSaturation()->getValue());
		$this->assertEquals($l, $color->getLightness()->getValue());
	}
}
?>