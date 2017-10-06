<?php
namespace Lib\Color;

class Saturation
{
	public const BLACK = 0;
	public const BLUE = 100;
	public const BROWN = 59;
	public const CYAN = 100;
	public const GREEN = 100;
	public const ORANGE = 100;
	public const PINK = 100;
	public const RED = 100;
	public const VIOLET = 76;
	public const WHITE = 0;
	public const YELLOW = 100;
	
	protected $value;
	
	public function __construct(int $value)
	{
		$this->setValue($value);
	}
	public function setValue(int $value)
	{
		if ($value < 0 or $value > 100) {
			throw new \OutOfRangeException('Saturation out of range.');
		}
		$this->value = $value;
	}
	public function getValue()
	{
		return $this->value;
	}
}
?>