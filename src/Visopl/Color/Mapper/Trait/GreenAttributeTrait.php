<?php 
namespace Visopl\Color\Mapper\Trait; 

trait GreenAttributeTrait 
{
    public function setGreen(mixed $green): void 
    {
        $this->setAttribute('green', $green);
    }

    public function getGreen(): mixed 
    {
        return $this->getAttribute('green');
    }
}