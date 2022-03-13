# PHP Color Library
PHP Color Library for building and converting colors

# Building color formats
```php
$factory = new Visopl\Color\Factory\BuilderFactory();

// #F60
echo $factory->create('hex', ['red' => 'F', 'green' => 6, 'blue' => 0, 'short' => true]);

// #255957
echo $factory->create('hex', ['red' => 25, 'green' => 59, 'blue' => 57]);

// #255957BF
echo $factory->create('hex', ['red' => 25, 'green' => 59, 'blue' => 57, 'alpha' => 'BF']);

// rgb(37, 89, 87)
echo $factory->create('rgb', ['red' => 37, 'green' => 89, 'blue' => 87]);

// rgba(37, 89, 87, 0.85)
echo $factory->create('rgb', ['red' => 37, 'green' => 89, 'blue' => 87, 'alpha' => 0.85]);

// rgb(15%, 35%, 34%)
echo $factory->create('rgb', ['red' => 15, 'green' => 35, 'blue' => 34, 'percents' => true]);

// rgba(15%, 35%, 34%, 0.85)
echo $factory->create('rgb', ['red' => 15, 'green' => 35, 'blue' => 34, 'alpha' => 0.85, 'percents' => true]);

// hsl(178, 41%, 25%)
echo $factory->create('hsl', ['hue' => 178, 'saturation' => 41, 'lightness' => 25]);

// hsla(178, 41%, 25%, 0.85)
echo $factory->create('hsl', ['hue' => 178, 'saturation' => 41, 'lightness' => 25, 'alpha' => 0.85]); 
```

# Converting colors
```php
$factory = new Visopl\Color\Factory\ConverterFactory();

// aliceblue - it is working only if color is defined in Visopl\Color\Color::$colors list
echo $factory->create('hex-to-text', '#F0F8FF'); 

// #F0F8FF - it is working only if color is defined in Visopl\Color\Color::$colors list
echo $factory->create('text-to-hex', 'aliceblue');

// rgb(37, 89, 87)
echo $factory->create('hex-to-rgb', '#255957'); 

// rgba(37, 89, 87, 0.75)
echo $factory->create('hex-to-rgb', '#255957BF');

// #255957
echo $factory->create('rgb-to-hex', 'rgb(37, 89, 87)');

// #255957BF
echo $factory->create('rgb-to-hex', 'rgba(37, 89, 87, 0.75)');
```