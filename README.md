# Color Library
Color names, transformations and random generation

## What is it?
I want to create a library that can manipulate color according to human definitions 
and give something that is usable for php. Also, being able to generate colors randomly.

## How?
I use 2 libraries that have some of the functionality that I wanted:
* [mikeemoo/ColorJizz-PHP](https://github.com/mikeemoo/ColorJizz-PHP) which manipulates 
  different formats of colors.
* [mistic100/RandomColor.php](https://github.com/mistic100/RandomColor.php) which extends 
  [randomColor](https://github.com/davidmerfield/randomColor) for generating random colors. 

With these, I can get most of the functionality. What was missing was the definitions.

## Factory
ColorFactory allows the creation of a color or random colors based on the libraries 
and also create a color based on the name of the color according to [Wikipedia](https://en.wikipedia.org/wiki/List_of_colors:_A%E2%80%93F)

`ColorFactory::RGB`, `ColorFactory::Hex`, `ColorFactory::CMYK`, `ColorFactory::HSV`, `ColorFactory::HSL` 
work according to ColorJizz.
`ColorFactory::random` connect with RandomColor.
`ColorFactoyr::color` requires the name of a color, eg. blue.

```php
ColorFactory::color('blue')
```

returns:

```
(Object) Color: {
    $hue => 240,
    $saturation => 100,
    $lightness => 50
}
```

and

```php
$color = ColorFactory::color('blue');
var_dump($color->transform('rgb'));
```

returns:

```
(Object) RGB: {
    $red => 0,
    $green => 0,
    $blue => 100
}
```