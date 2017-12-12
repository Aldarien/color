<?php
use PHPUnit\Framework\TestCase;
use Lib\Color\Color;
use Lib\Color\Hue;
use Lib\Color\Lightness;
use Lib\Color\Saturation;

class ColorTest extends TestCase
{
	protected $color;
	
	public function setUp()
	{
		$this->color = new Color();
	}
	public function testName()
	{
		$name = 'base';
		$this->assertNotEquals($name, $this->color->getName());
		$this->color->setName($name);
		$this->assertEquals($name, $this->color->getName());
	}
	public function testHue()
	{
		$hue = 1;
		$this->assertNotEquals($hue, $this->color->getHue());
		$this->color->setHue($hue);
		$hue = new Hue($hue);
		$this->assertEquals($hue, $this->color->getHue());
	}
	public function testLightness()
	{
		$lightness = 1;
		$this->assertNotEquals($lightness, $this->color->getLightness());
		$this->color->setLightness($lightness);
		$lightness = new Lightness($lightness);
		$this->assertEquals($lightness, $this->color->getLightness());
	}
	public function testSaturation()
	{
		$saturation = 1;
		$this->assertNotEquals($saturation, $this->color->getSaturation());
		$this->color->setSaturation($saturation);
		$saturation = new Saturation($saturation);
		$this->assertEquals($saturation, $this->color->getSaturation());
	}	
}
?>