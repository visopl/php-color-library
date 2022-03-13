<?php 
namespace Visopl\Color\Factory;

use InvalidArgumentException;
use OutOfBoundsException;
use ReflectionClass;
use Visopl\Color\Builder\HexBuilder;
use Visopl\Color\Builder\HslBuilder;
use Visopl\Color\Builder\RgbBuilder;
use Visopl\Color\Mapper\HexMapper;
use Visopl\Color\Mapper\HslMapper;
use Visopl\Color\Mapper\RgbMapper;

class BuilderFactory implements FactoryInterface 
{
    public const HEX = 'hex'; 
    public const RGB = 'rgb'; 
    public const HSL = 'hsl'; 

    public const RED = 'red';
    public const GREEN = 'green'; 
    public const BLUE = 'blue';
    public const HUE = 'hue';
    public const SATURATION = 'saturation'; 
    public const LIGHTNESS = 'lightness';
    public const ALPHA = 'alpha';
    public const SHORT = 'short'; 
    public const PERCENTS = 'percents';

    static public array $builders = [
        self::HEX => ['mapper' => HexMapper::class, 'builder' => HexBuilder::class], 
        self::RGB => ['mapper' => RgbMapper::class, 'builder' => RgbBuilder::class], 
        self::HSL => ['mapper' => HslMapper::class, 'builder' => HslBuilder::class]
    ];

    public function create(string $name, null|string|array $data = null): string
    {
        if (!isset(self::$builders[$name])) {
            throw new OutOfBoundsException(sprintf('Builder "%s" is not defined', $name));
        }

        if (!is_array($data) || empty($data)) {
            throw new InvalidArgumentException('You must specify data an array for create new builder.');
        }

        $reflection = new ReflectionClass(self::$builders[$name]['mapper']); 
        $mapper = $reflection->newInstance(); 

        if (
            $mapper instanceof self::$builders[self::HEX]['mapper'] || 
            $mapper instanceof self::$builders[self::RGB]['mapper']
        ) {
            if (isset($data[self::RED])) {
                $mapper->setRed($data[self::RED]);
            }

            if (isset($data[self::GREEN])) {
                $mapper->setGreen($data[self::GREEN]);
            }

            if (isset($data[self::BLUE])) {
                $mapper->setBlue($data[self::BLUE]);
            }
        }

        if ($mapper instanceof self::$builders[self::HSL]['mapper']) {
            if (isset($data[self::HUE])) {
                $mapper->setHue($data[self::HUE]);
            }

            if (isset($data[self::SATURATION])) {
                $mapper->setSaturation($data[self::SATURATION]);
            }

            if (isset($data[self::LIGHTNESS])) {
                $mapper->setLightness($data[self::LIGHTNESS]);
            }
        }

        if (isset($data[self::ALPHA])) {
            $mapper->setAlpha($data[self::ALPHA]);
        }

        $dependecies = ['mapper' => $mapper];

        if (
            $mapper instanceof self::$builders[self::HEX]['mapper'] &&
            isset($data[self::SHORT])
        ) {
            $dependecies[self::SHORT] = $data[self::SHORT]; 
        }

        if (
            $mapper instanceof self::$builders[self::RGB]['mapper'] &&
            isset($data[self::PERCENTS])
        ) {
            $dependecies[self::PERCENTS] = $data[self::PERCENTS]; 
        }

        $reflection = new ReflectionClass(self::$builders[$name]['builder']); 
        $builder = $reflection->newInstanceArgs($dependecies); 
        
        return $builder->build(); 
    }
}