<?php 
namespace Visopl\Color\Converter;

use OutOfBoundsException;
use Visopl\Color\Color;

class TextToHexConverter extends BaseConverter 
{
    public function convert(): string  
    {
        if (!isset($this->value, Color::$colors)) {
            throw new OutOfBoundsException(sprintf('HEX color for text color "%s" is not defined.', $this->value));
        }

        return Color::$colors[$this->value]; 
    }
}