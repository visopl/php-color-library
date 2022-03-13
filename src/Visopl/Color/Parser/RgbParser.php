<?php 
namespace Visopl\Color\Parser;

use InvalidArgumentException;
use Visopl\Color\Mapper\MapperInterface;
use Visopl\Color\Mapper\RgbMapper;

class RgbParser extends BaseParser 
{
    public function parse(): MapperInterface
    {
        $this->value = str_replace(['rgb', 'a', '(', ')', '%', ' '], '', $this->value); 

        $parameters = explode(',', $this->value); 
        $count = count($parameters); 

        if ($count < 3 || $count > 4) {
            throw new InvalidArgumentException('RGB(a) color should have 3 or 4 numbers.');
        }

        $red = !empty($parameters[0]) ? $parameters[0] : 0;
        $green = !empty($parameters[1]) ? $parameters[1] : 0;
        $blue = !empty($parameters[2]) ? $parameters[2] : 0;
        $alpha = (isset($parameters[3]) && (!empty($parameters[3]) || $parameters[3] === '0')) ? $parameters[3] : false; 

        $mapper = new RgbMapper(); 
        $mapper->setRed($red); 
        $mapper->setGreen($green); 
        $mapper->setBlue($blue); 

        if ($alpha !== false) {
            $mapper->setAlpha($alpha); 
        }

        return $mapper; 
    }
}