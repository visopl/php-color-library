<?php 
namespace Visopl\Color\Validator;

use InvalidArgumentException;

class CharacterValidator implements ValidatorInterface 
{
    public const CHARACTERS_SET = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'A', 'B', 'C', 'D', 'E', 'F'];

    private bool $short; 

    public function __construct(bool $short = false) 
    {
        $this->short = $short; 
    }

    public function validate(string $name, mixed $value): void  
    {
        $length = match($this->short) {
            false => '2', 
            true => '1' 
        };

        $pattern = '/^['.implode('', self::CHARACTERS_SET).']{'.$length.'}$/'; 
        
        if (!preg_match($pattern, strtoupper($value))) {
            throw new InvalidArgumentException(sprintf(
                'Value "%s" must have maximum length %d and must be in set: %s', 
                $name, 
                $length, 
                implode(', ', self::CHARACTERS_SET)
            ));
        }
    }
}