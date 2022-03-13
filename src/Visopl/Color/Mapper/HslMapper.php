<?php 
namespace Visopl\Color\Mapper;

use Visopl\Color\Mapper\Trait\AlphaAttributeTrait;

class HslMapper extends BaseMapper 
{
    use AlphaAttributeTrait; 

    public function setHue(mixed $hue): void 
    {
        $this->setAttribute('hue', $hue); 
    }

    public function getHue(): mixed 
    {
        return $this->getAttribute('hue'); 
    }

    public function setSaturation(mixed $saturation): void 
    {
        $this->setAttribute('saturation', $saturation); 
    }

    public function getSaturation(): mixed 
    {
        return $this->getAttribute('saturation'); 
    }

    public function setLightness(mixed $lightness): void 
    {
        $this->setAttribute('lightness', $lightness); 
    }

    public function getLightness(): mixed 
    {
        return $this->getAttribute('lightness'); 
    }
}