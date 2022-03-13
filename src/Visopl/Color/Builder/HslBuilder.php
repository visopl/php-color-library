<?php 
namespace Visopl\Color\Builder;

use Visopl\Color\Color;
use Visopl\Color\Normalizer\FormatNormalizer;
use Visopl\Color\Validator\AlphaValidator;
use Visopl\Color\Validator\NumericValidator;
use Visopl\Color\Validator\PercentValidator;

class HslBuilder extends BaseBuilder 
{
    public function build(): string
    {
        $hue = $this->mapper->getHue(); 
        $saturation = $this->mapper->getSaturation(); 
        $lightness = $this->mapper->getLightness(); 

        $numericValidator = new NumericValidator(0, 360);
        $numericValidator->validate('hue', $hue); 
        
        $percentValidator = new PercentValidator();
        $percentValidator->validate('saturation', $saturation); 
        $percentValidator->validate('lightness', $lightness); 

        $parameters = ['h' => $hue, 's' => $saturation, 'l' => $lightness];

        if (!$this->mapper->hasAlpha()) {
            $format = Color::FORMAT_HSL; 
        } else {
            $alpha = $this->mapper->getAlpha(); 

            $alphaValidator = new AlphaValidator(); 
            $alphaValidator->validate('alpha', $alpha); 

            $parameters['a'] = $alpha; 
            $format = Color::FORMAT_HSLA;
        }

        $normalizer = new FormatNormalizer();

        return $normalizer->normalize($format, $parameters);
    }
}