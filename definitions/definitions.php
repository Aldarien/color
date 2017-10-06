<?php
$basic_colors = ['black', 'blue', 'brown', 'cyan', 'green', 'orange', 'pink', 'red', 'violet', 'white', 'yellow'];
foreach ($basic_colors as $i => $color) {
	$basic_colors[$color] = \Lib\Color\ColorFactory::HSL(
			constant('\Lib\Color\Hue::' . strtoupper($color)),
			constant('\Lib\Color\Lightness::' . strtoupper($color)),
			constant('\Lib\Color\Saturation::' . strtoupper($color)),
			$color
	);
	unset($basic_colors[$i]);
}
$basic_colors = (object) $basic_colors;
?>