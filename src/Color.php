<?php
namespace Lib\Color;

use MischiefCollective\ColorJizz\Formats\HSL;

class Color
{
	protected $name;
	protected $hue;
	protected $lightness;
	protected $saturation;
	
	/**
	 * Name of the color
	 * @param string $name
	 */
	public function setName(string $name)
	{
		$this->name = $name;
	}
	/**
	 * 
	 * @param float $hue_value Hue value between [0°, 360°[ or [0, 2PI[ rad
	 * @param bool $rad if values are radians
	 */
	public function setHue(float $hue_value, bool $rad = false)
	{
		if ($rad) {
			$hue_value = $hue_value * 360 / 2 / pi();
			if ($hue_value > 360) {
				$hue_value -= 360;
			}
		}
		$this->hue = new Hue($hue_value);
	}
	/**
	 * 
	 * @param float $sat_L_value saturation value in HSL
	 * @param bool $percent if number es from [0, 100] or [0, 1]
	 */
	public function setSaturation(float $sat_L_value, bool $percent = true)
	{
		if (!$percent) {
			$sat_L_value *= 100;
		}
		$this->saturation = new Saturation($sat_L_value);
	}
	/**
	 * 
	 * @param float $value Lightness value
	 * @param bool $percent if number is from [0, 100] or [0, 1]
	 */
	public function setLightness(float $value, bool $percent = true)
	{
		if (!$percent) {
			$value *= 100;
		}
		$this->lightness = new Lightness($value);
	}
	public function getName()
	{
		return $this->name;
	}
	public function getHue()
	{
		return $this->hue;
	}
	public function getSaturation()
	{
		return $this->saturation;
	}
	public function getLightness()
	{
		return $this->lightness;
	}
	/**
	 * Transform to other formats with MischiefCollective\ColorJizz
	 * @param string $type
	 * @throws \InvalidArgumentException
	 */
	public function transform(string $type)
	{
		$transform = 'to' . strtoupper($type);
		$hsl = new HSL($this->hue->getValue(), $this->saturation->getValue(), $this->lightness->getValue());
		if ($type == 'hsl') {
			return $hsl;
		}
		if (method_exists($hsl, $transform)) {
			return $hsl->{$transform}();
		}
		throw new \InvalidArgumentException('Type ' . $type . ' not implemented.');
	}
	
	/**
	 * Darken the color by % value
	 * @param double $value positive value to darken in [0, 1] or [0, 100] range.
	 * @param bool $percent (optional) if in [0, 1] or [0, 100] range.
	 */
	public function darken(double $value, bool $percent = false)
	{
		if ($percent) {
			$value /= 100;
		}
		if ($value < 0 or $value > 1) {
			throw new \OutOfRangeException($percent . ' is out of [0, 1] range.');
		}
		$sat = $this->saturation->getValue();
		$sat *= (1 - $value);
		if ($sat < 0) {
			$sat = 0;
		}
		$this->saturation->setValue($sat);
	}
	/**
	 * Lighten the color by % value
	 * @param double $value positive value to lighten in [0, 1] or [0, 100] range.
	 * @param bool $percent (optional) if in [0, 1] or [0, 100] range.
	 */
	public function lighten(double $value, bool $percent = false)
	{
		if ($percent) {
			$value /= 100;
		}
		if ($value < 0 or $value > 1) {
			throw new \OutOfRangeException($percent . ' is out of [0, 1] range.');
		}
		$sat = $this->saturation->getValue();
		$sat *= (1 + $value);
		if ($sat > 100) {
			$sat = 100;
		}
		$this->saturation->setValue($sat);
	}
	
	public function __call($name, $args)
	{
		if (method_exists($this, $name)) {
			call_user_func_array([$this, $name], $args);
		}
		return $this->transform($name);
	}
}
?>