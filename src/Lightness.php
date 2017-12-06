<?php
namespace Lib\Color;

/**
 * Lightness value from 0 to 100
 * @author Aldarien
 *
 */
class Lightness
{
	public const BLACK = 0;
	public const BLUE = 50;
	public const BROWN = 41;
	public const CYAN = 50;
	public const GREEN = 25;
	public const ORANGE = 50;
	public const PINK = 88;
	public const RED = 50;
	public const VIOLET = 72;
	public const WHITE = 100;
	public const YELLOW = 50;
	
	protected $value;
	
	public function __construct(int $value)
	{
		$this->setValue($value);
	}
	public function setValue(int $value)
	{
		if ($value < 0 or $value > 100) {
			throw new \OutOfRangeException('Lightness out of range.');
		}
		$this->value = $value;
	}
	public function getValue()
	{
		return $this->value;
	}
}
?>