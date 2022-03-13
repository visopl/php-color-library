<?php 
namespace Visopl\Color\Mapper;

use OutOfBoundsException;

abstract class BaseMapper implements MapperInterface 
{
    protected array $attributes = [];

    public function hasAttribute(string $key): bool 
    {   
        return array_key_exists($key, $this->attributes) && $this->attributes[$key] !== false; 
    }

    public function setAttribute(string $key, mixed $value): void
    {
        $this->attributes[$key] = $value; 
    }

    public function getAttribute(string $key): mixed
    {
        if (!$this->hasAttribute($key)) {
            throw new OutOfBoundsException(sprintf('Attribute "%s" is not defined.', $key));
        }

        return $this->attributes[$key]; 
    }
}