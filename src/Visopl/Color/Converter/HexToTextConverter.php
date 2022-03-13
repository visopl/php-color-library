<?php 
namespace Visopl\Color\Converter;

use OutOfBoundsException;
use Visopl\Color\Color;

class HexToTextConverter extends BaseConverter  
{
    public function convert(): string  
    {
        $search = array_search($this->value, Color::$colors); 

        if (!$search) {
            throw new OutOfBoundsException(sprintf('Text color for HEX color "%s" is not defined.', $this->value));
        }

        return $search; 
    }
}