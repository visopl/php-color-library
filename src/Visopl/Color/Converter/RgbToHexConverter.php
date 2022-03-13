<?php 
namespace Visopl\Color\Converter;

use Visopl\Color\Factory\BuilderFactory;
use Visopl\Color\Parser\RgbParser;

class RgbToHexConverter extends BaseConverter 
{
    private function replaceZeroValue(mixed $value): string  
    {
        return $value == '0' ? '00' : $value; 
    }

    public function convert(): string
    {
        $parser = new RgbParser($this->value);
        $mapper = $parser->parse();

        $data = [
            BuilderFactory::RED => $this->replaceZeroValue(dechex($mapper->getRed())), 
            BuilderFactory::GREEN => $this->replaceZeroValue(dechex($mapper->getGreen())), 
            BuilderFactory::BLUE => $this->replaceZeroValue(dechex($mapper->getBlue()))
        ];

        if ($mapper->hasAlpha()) {
            $data[BuilderFactory::ALPHA] = $this->replaceZeroValue(dechex(round($mapper->getAlpha() * 255))); 
        }

        $factory = new BuilderFactory();

        return $factory->create(BuilderFactory::HEX, $data); 
    }
}