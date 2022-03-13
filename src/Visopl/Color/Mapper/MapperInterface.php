<?php 
namespace Visopl\Color\Mapper; 

interface MapperInterface 
{
    public function setAttribute(string $key, mixed $value): void;  
    public function getAttribute(string $key): mixed; 
}