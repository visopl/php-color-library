<?php 
namespace Visopl\Color\Parser;

abstract class BaseParser implements ParserInterface 
{
    protected string $value; 

    public function __construct(string $value)
    {
        $this->value = $value;         
    }
}