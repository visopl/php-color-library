<?php 
namespace Visopl\Color\Mapper\Trait; 

trait BlueAttributeTrait 
{
    public function setBlue(mixed $blue): void 
    {
        $this->setAttribute('blue', $blue);
    }

    public function getBlue(): mixed 
    {
        return $this->getAttribute('blue');
    }
}