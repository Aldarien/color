<?php
use PHPUnit\Framework\TestCase;
use Lib\Color\Hue;

class HueTest extends TestCase
{
	public function testHueClassExists()
	{
		$hue = new Hue(0);
		$this->addToAssertionCount(1);
	}
	public function testGetValue()
	{
		$hue = new Hue(0);
		$this->assertEquals(0, $hue->getValue());
		$this->assertNotEquals(1, $hue->getValue());
	}
	public function testSetValue()
	{
		$hue = new Hue(0);
		$hue->setValue(1);
		$this->assertNotEquals(0, $hue->getValue());
		$this->assertEquals(1, $hue->getValue());
	}
}
?>