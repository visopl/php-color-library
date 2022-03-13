<?php 
namespace Visopl\Color\Factory;

use InvalidArgumentException;
use OutOfBoundsException;
use ReflectionClass;
use Visopl\Color\Converter\HexToRgbConverter;
use Visopl\Color\Converter\HexToTextConverter;
use Visopl\Color\Converter\RgbToHexConverter;
use Visopl\Color\Converter\TextToHexConverter;

class ConverterFactory implements FactoryInterface 
{
    public const HEX_TO_TEXT = 'hex-to-text';
    public const TEXT_TO_HEX = 'text-to-hex'; 
    public const HEX_TO_RGB = 'hex-to-rgb';
    public const RGB_TO_HEX = 'rgb-to-hex';

    static public $converters = [
        self::HEX_TO_TEXT => HexToTextConverter::class, 
        self::TEXT_TO_HEX => TextToHexConverter::class, 
        self::HEX_TO_RGB => HexToRgbConverter::class, 
        self::RGB_TO_HEX => RgbToHexConverter::class
    ];

    public function create(string $name, null|string|array $data = null): string
    {
        if (!isset(self::$converters[$name])) {
            throw new OutOfBoundsException(sprintf('Converter "%s" is not defined', $name));
        }

        if (!is_string($data) || empty($data)) {
            throw new InvalidArgumentException('You must specify value as string to create new conversion.');
        }

        $reflection = new ReflectionClass(self::$converters[$name]); 
        $converter = $reflection->newInstanceArgs(['value' => $data]);

        return $converter->convert(); 
    }
}