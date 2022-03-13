<?php 
namespace Visopl\Color\Mapper\Trait; 

trait AlphaAttributeTrait 
{
    public function hasAlpha(): bool 
    {
        return $this->hasAttribute('alpha');
    }

    public function setAlpha(mixed $alpha): void 
    {
        $this->setAttribute('alpha', $alpha);
    }

    public function getAlpha(): mixed 
    {
        return $this->getAttribute('alpha');
    }
}