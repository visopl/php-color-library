<?php 
namespace Visopl\Color\Mapper\Trait; 

trait RedAttributeTrait 
{
    public function setRed(mixed $red): void 
    {
        $this->setAttribute('red', $red);
    }

    public function getRed(): mixed 
    {
        return $this->getAttribute('red');
    }
}