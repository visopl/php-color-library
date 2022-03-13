<?php 
namespace Visopl\Color\Parser;

use InvalidArgumentException;
use Visopl\Color\Mapper\HslMapper;
use Visopl\Color\Mapper\MapperInterface;

class HslParser extends BaseParser 
{
    public function parse(): MapperInterface
    {
        $this->value = str_replace(['hsl', 'a', '(', ')', '%', ' '], '', $this->value); 

        $parameters = explode(',', $this->value); 
        $count = count($parameters); 

        if ($count < 3 || $count > 4) {
            throw new InvalidArgumentException('HSL(a) color should have 3 or 4 numbers.');
        }

        $hue = !empty($parameters[0]) ? $parameters[0] : 0; 
        $saturation = !empty($parameters[1]) ? $parameters[1] : 0; 
        $lightness = !empty($parameters[2]) ? $parameters[2] : 0; 
        $alpha = !empty($parameters[3]) ? $parameters[3] : false; 

        $mapper = new HslMapper();
        $mapper->setHue($hue);
        $mapper->setSaturation($saturation); 
        $mapper->setLightness($lightness);

        if ($alpha) {
            $mapper->setAlpha($alpha); 
        }

        return $mapper; 
    }
}