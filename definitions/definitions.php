<?php
$__COLORS = ['black', 'blue', 'brown', 'cyan', 'green', 'orange', 'pink', 'red', 'violet', 'white', 'yellow'];
foreach ($__COLORS as $i => $color) {
	$__COLORS[$color] = \Lib\Color\ColorFactory::HSL(
			constant('\Lib\Color\Hue::' . strtoupper($color)),
			constant('\Lib\Color\Lightness::' . strtoupper($color)),
			constant('\Lib\Color\Saturation::' . strtoupper($color)),
			$color
	);
	unset($__COLORS[$i]);
}
$__COLORS = (object) $__COLORS;
?>