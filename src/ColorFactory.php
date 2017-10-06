<?php
namespace Lib\Color;

use MischiefCollective\ColorJizz\Formats\HSV;
use MischiefCollective\ColorJizz\Formats\RGB;
use MischiefCollective\ColorJizz\Formats\CMYK;
use Colors\RandomColor;
use MischiefCollective\ColorJizz\Formats\Hex;

class ColorFactory
{
	public static function RGB(float $r, float $g, float $b, string $name = '')
	{
		$rgb = new RGB($r, $g, $b);
		$hsl = $rgb->toHSL();
		return self::HSL($hsl->hue, $hsl->saturation, $hsl->lightness, $name);
	}
	public static function Hex(string $hex, $name = '')
	{
		$hex = new Hex($hex);
		$hsl = $hex->toHSL();
		return self::HSL($hsl->hue, $hsl->saturation, $hsl->lightness, $name);
	}
	public static function CMYK(float $c, float $m, float $y, float $k, string $name)
	{
		$cymk = new CMYK($c, $m, $y, $k);
		$hsl = $cymk->toHSL();
		return self::HSL($hsl->hue, $hsl->saturation, $hsl->lightness, $name);
	}
	public static function HSV(float $h, float $s, float $v, string $name = '')
	{
		$hsv = new HSV($h, $s, $v);
		$hsl = $hsv->toHSL();
		return self::HSL($hsl->hue, $hsl->saturation, $hsl->lightness, $name);
	}
	public static function HSL(float $h, float $s, float $l, string $name = '')
	{
		$color = new Color();
		$color->setHue($h);
		$color->setSaturation($s);
		$color->setLightness($l);
		if ($name != '') {
			$color->setName($name);
		}
		return $color;
	}
	public static function random($n = 1, $hue = null, $luminosity = null, $prng = null)
	{
		$args = [];
		if ($hue != null) {
			$args['hue'] = $hue;
		}
		if ($luminosity != null) {
			$args['luminosity'] = $luminosity;
		}
		if ($prng != null) {
			$args['prng'] = $prng;
		}
		$colors = [];
		if ($n == 1) {
			if (count($args) > 0) {
				$colors []= RandomColor::one($args);
			} else {
				$colors []= RandomColor::one();
			}
		}
		if (count($args) > 0) {
			$colors = RandomColor::many($n, $args);
		} else {
			$colors = RandomColor::many($n);
		}
		$colors = self::parseRandomColor($colors);
		if ($n == 1) {
			return $colors[0];
		}
		return $colors;
	}
	protected static function parseRandomColor(array $colors)
	{
		$output = [];
		foreach ($colors as $color) {
			$output []= self::Hex($color);
		}
		return $output;
	}
}
?>