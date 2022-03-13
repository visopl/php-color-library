<?php 
namespace Visopl\Color\Builder;

use Visopl\Color\Color;
use Visopl\Color\Mapper\MapperInterface;
use Visopl\Color\Normalizer\FormatNormalizer;
use Visopl\Color\Validator\AlphaValidator;
use Visopl\Color\Validator\NumericValidator;
use Visopl\Color\Validator\PercentValidator;

class RgbBuilder extends BaseBuilder  
{
    private bool $percents; 

    public function __construct(MapperInterface $mapper, bool $percents = false)
    {
        parent::__construct($mapper); 
        $this->percents = $percents;         
    }

    public function build(): string
    {
        $red = $this->mapper->getRed();
        $green = $this->mapper->getGreen(); 
        $blue = $this->mapper->getBlue(); 

        if ($this->percents) {
            $mainValidator = new PercentValidator();
        } else {
            $mainValidator = new NumericValidator(0, 255); 
        }

        $mainValidator->validate('red', $red); 
        $mainValidator->validate('green', $green); 
        $mainValidator->validate('blue', $blue);

        $parameters = ['r' => $red, 'g' => $green, 'b' => $blue];

        if (!$this->mapper->hasAlpha()) {
            $format = $this->percents ? Color::FORMAT_RGB_PERCENTS : Color::FORMAT_RGB; 
        } else {
            $alpha = $this->mapper->getAlpha();

            $alphaValidator = new AlphaValidator();
            $alphaValidator->validate('alpha', $alpha);

            $parameters['a'] = $alpha; 
            $format = $this->percents ? Color::FORMAT_RGBA_PERCENTS : Color::FORMAT_RGBA;
        }

        $normalizer = new FormatNormalizer(); 

        return $normalizer->normalize($format, $parameters);
    }
}