<?php 
namespace Visopl\Color\Validator;

use InvalidArgumentException;

class NumericValidator implements ValidatorInterface 
{
    private int $rangeMin; 
    private int $rangeMax; 

    public function __construct(int $rangeMin, int $rangeMax)
    {
        $this->rangeMin = $rangeMin; 
        $this->rangeMax = $rangeMax;         
    }

    public function validate(string $name, mixed $value): void  
    {
        if ($value < $this->rangeMin || $value > $this->rangeMax) {
            throw new InvalidArgumentException(sprintf(
                'Value "%s" must be in range between %d and %d.', 
                $name, 
                $this->rangeMin, 
                $this->rangeMax
            ));
        }
    }
}