<?php
namespace Lib\Color;

class Hue
{
	public const BLACK = 0;
	public const BLUE = 240;
	public const BROWN = 0;
	public const CYAN = 120;
	public const GREEN = 120;
	public const ORANGE = 39;
	public const PINK = 350;
	public const RED = 0;
	public const VIOLET = 300;
	public const WHITE = 0;
	public const YELLOW = 60;
	
	protected $value;
	
	public function __construct(int $value)
	{
		$this->setValue($value);
	}
	public function setValue(int $value)
	{
		if ($value < 0 or $value >= 360) {
			throw new \OutOfRangeException('Hue out of range.');
		}
		$this->value = $value;
	}
	public function getValue()
	{
		return $this->value;
	}
}
?>