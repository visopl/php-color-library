<?php 
namespace Visopl\Color\Builder;

use Visopl\Color\Color;
use Visopl\Color\Mapper\MapperInterface;
use Visopl\Color\Normalizer\FormatNormalizer;
use Visopl\Color\Validator\CharacterValidator;

class HexBuilder extends BaseBuilder
{
    private bool $short; 

    public function __construct(MapperInterface $mapper, bool $short = false)
    {
        parent::__construct($mapper); 
        $this->short = $short;         
    }

    public function build(): string
    {
        $red = $this->mapper->getRed(); 
        $green = $this->mapper->getGreen(); 
        $blue = $this->mapper->getBlue();

        $characterValidator = new CharacterValidator($this->short); 

        $characterValidator->validate('red', $red); 
        $characterValidator->validate('green', $green); 
        $characterValidator->validate('blue', $blue);

        $parameters = ['r' => $red, 'g' => $green, 'b' => $blue];

        if (!$this->mapper->hasAlpha()) {
            $format = Color::FORMAT_HEX; 
        } else {
            $alpha = $this->mapper->getAlpha(); 
            $characterValidator->validate('alpha', $alpha);
            $parameters['a'] = $alpha; 
            $format = Color::FORMAT_HEXA; 
        }

        $normalizer = new FormatNormalizer(); 

        return strtoupper($normalizer->normalize($format, $parameters));
    }
}