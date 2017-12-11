<?php
use PHPUnit\Framework\TestCase;
use Lib\Color\Saturation;

class SaturationTest extends TestCase
{
	public function testSaturationClassExists()
	{
		$saturation = new Saturation(0);
		$this->addToAssertionCount(1);
	}
	public function testGetValue()
	{
		$saturation = new Saturation(0);
		$this->assertEquals(0, $saturation->getValue());
		$this->assertNotEquals(1, $saturation->getValue());
	}
	public function testSetValue()
	{
		$saturation = new Saturation(0);
		$saturation->setValue(1);
		$this->assertNotEquals(0, $saturation->getValue());
		$this->assertEquals(1, $saturation->getValue());
	}
}
?>