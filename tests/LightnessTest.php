<?php
use PHPUnit\Framework\TestCase;
use Lib\Color\Lightness;

class LightnessTest extends TestCase
{
	public function testLightnessClassExists()
	{
		$lightness = new Lightness(0);
		$this->addToAssertionCount(1);
	}
	public function testGetValue()
	{
		$lightness = new Lightness(0);
		$this->assertEquals(0, $lightness->getValue());
		$this->assertNotEquals(1, $lightness->getValue());
	}
	public function testSetValue()
	{
		$lightness = new Lightness(0);
		$lightness->setValue(1);
		$this->assertNotEquals(0, $lightness->getValue());
		$this->assertEquals(1, $lightness->getValue());
	}
}
?>