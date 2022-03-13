<?php 
namespace Visopl\Color\Validator; 

interface ValidatorInterface 
{
    public function validate(string $name, mixed $value): void; 
}