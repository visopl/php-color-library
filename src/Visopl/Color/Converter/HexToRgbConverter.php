<?php 
namespace Visopl\Color\Converter;

use Visopl\Color\Factory\BuilderFactory;
use Visopl\Color\Parser\HexParser;

class HexToRgbConverter extends BaseConverter 
{
    public function convert(): string
    {
        $parser = new HexParser($this->value); 
        $mapper = $parser->parse(); 

        $data = [
            BuilderFactory::RED => hexdec($mapper->getRed()), 
            BuilderFactory::GREEN => hexdec($mapper->getGreen()), 
            BuilderFactory::BLUE => hexdec($mapper->getBlue()), 
        ];

        if ($mapper->hasAlpha()) {
            $data[BuilderFactory::ALPHA] = round((hexdec($mapper->getAlpha()) / 255), 2); 
        }

        $factory = new BuilderFactory(); 

        return $factory->create(BuilderFactory::RGB, $data); 
    }
}