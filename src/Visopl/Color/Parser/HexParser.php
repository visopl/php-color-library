<?php 
namespace Visopl\Color\Parser;

use InvalidArgumentException;
use Visopl\Color\Mapper\HexMapper;
use Visopl\Color\Mapper\MapperInterface;

class HexParser extends BaseParser 
{
    public function parse(): MapperInterface
    {
        $this->value = strtoupper(ltrim($this->value, '#'));

        $length = strlen($this->value); 

        if ($length < 3 || $length > 8) {
            throw new InvalidArgumentException('HEX color should have 3 or 8 characters (excluding # symbol).');
        }

        $red = $length == 3 ? str_repeat(substr($this->value, 0, 1), 2) : substr($this->value, 0, 2);
        $green = $length == 3 ? str_repeat(substr($this->value, 1, 1), 2) : substr($this->value, 2, 2);
        $blue = $length == 3 ? str_repeat(substr($this->value, 2, 1), 2) : substr($this->value, 4, 2);
        $alpha = $length == 8 ? substr($this->value, 6, 2) : false; 

        $mapper = new HexMapper(); 
        $mapper->setRed($red); 
        $mapper->setGreen($green); 
        $mapper->setBlue($blue); 

        if ($alpha) {
            $mapper->setAlpha($alpha); 
        }

        return $mapper; 
    }
}