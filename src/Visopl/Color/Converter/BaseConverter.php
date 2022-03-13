<?php 
namespace Visopl\Color\Converter; 

abstract class BaseConverter implements ConverterInterface 
{
    protected string $value; 

    public function __construct(string $value)
    {
        $this->value = $value;         
    }
}