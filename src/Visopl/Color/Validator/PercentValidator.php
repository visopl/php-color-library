<?php 
namespace Visopl\Color\Validator;

use InvalidArgumentException;

class PercentValidator implements ValidatorInterface 
{
    public const RANGE_MIN = 0; 
    public const RANGE_MAX = 100; 

    public function validate(string $name, mixed $value): void  
    {
        if ($value < self::RANGE_MIN || $value > self::RANGE_MAX) {
            throw new InvalidArgumentException(sprintf(
                'Value "%s" must be in range between %d and %d.', 
                $name, 
                self::RANGE_MIN, 
                self::RANGE_MAX
            ));
        }
    }
}